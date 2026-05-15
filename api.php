<?php
/**
 * SQL Lab Backend API - Skills Builder Hub
 * Hardened version with Advanced Analytics, Centralized History & Data Engineering Suite
 * Enhanced with: Auto-Correction Suggestions & Syntax Intelligent Feedback
 */

// 1. FORCE ERROR REPORTING FOR DEBUGGING
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. HEADERS (Crucial for CORS and JSON)
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Handle pre-flight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit;
}

// 3. DATABASE CONFIGURATIONS
$ro_db_config = [
    'host' => 'srv1402.hstgr.io',
    'user' => 'u855754050_dineshtest',
    'pass' => 'Samsung@9842',
    'name' => 'u855754050_test_db'
];

$rw_db_config = [
    'host' => 'srv1402.hstgr.io',
    'user' => 'u855754050_mtech_dinesh',
    'pass' => 'Samsung@9842',
    'name' => 'u855754050_mtechcandidate'
];

// 4. INPUT PROCESSING
$action = $_GET['action'] ?? '';
$raw_input = file_get_contents('php://input');
$input = json_decode($raw_input, true);

try {
    // DIAGNOSTIC: Check if JSON is actually arriving
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($raw_input)) {
        throw new Exception("No data received by the server.");
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && is_null($input)) {
        throw new Exception("Malformed JSON: " . json_last_error_msg());
    }

    switch ($action) {
        case 'get_tables':
            $db_mode = $input['db_mode'] ?? 'ro';
            $db_config = ($db_mode === 'rw') ? $rw_db_config : $ro_db_config;
            get_tables($db_config);
            break;

        case 'run_query':
            $db_mode = $input['db_mode'] ?? 'ro';
            $query = $input['query'] ?? '';
            run_query($query, $ro_db_config, $rw_db_config, $db_mode);
            break;

        case 'get_history':
            $search = $input['search'] ?? '';
            $status = $input['status'] ?? '';
            get_history($rw_db_config, $search, $status);
            break;

        case 'generate_sql':
            handle_ai_generation($input['prompt'] ?? '');
            break;

        case 'test_connection':
            test_all_connections($ro_db_config, $rw_db_config);
            break;

        case 'analyze_query':
            analyze_query($input['query'] ?? '');
            break;

        case 'get_execution_plan':
            $db_mode = $input['db_mode'] ?? 'ro';
            $query = $input['query'] ?? '';
            get_metadata_query("EXPLAIN " . $query, $ro_db_config, $rw_db_config, $db_mode);
            break;

        case 'describe_table':
            $db_mode = $input['db_mode'] ?? 'ro';
            $table = $input['table'] ?? '';
            get_metadata_query("DESCRIBE " . $table, $ro_db_config, $rw_db_config, $db_mode);
            break;

        default:
            throw new Exception("Unsupported action: " . htmlspecialchars($action));
    }

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'error' => $e->getMessage(),
        'debug_info' => [
            'action' => $action,
            'method' => $_SERVER['REQUEST_METHOD']
        ]
    ]);
}

// --- CORE FUNCTIONS ---

function db_connect($config) {
    $conn = @new mysqli($config['host'], $config['user'], $config['pass'], $config['name']);
    if ($conn->connect_error) {
        throw new Exception("Connect Error (" . $conn->connect_errno . ") " . $conn->connect_error);
    }
    $conn->set_charset("utf8mb4");
    return $conn;
}

function get_tables($db_config) {
    $conn = db_connect($db_config);
    $result = $conn->query("SHOW TABLES");
    if (!$result) {
        throw new Exception("Schema Query Failed: " . $conn->error);
    }
    $tables = [];
    while ($row = $result->fetch_array()) { $tables[] = $row[0]; }
    $conn->close();
    echo json_encode(['tables' => $tables]);
}

function get_metadata_query($query, $ro, $rw, $mode) {
    $conn = ($mode === 'rw') ? db_connect($rw) : db_connect($ro);
    $result = $conn->query($query);
    if (!$result) throw new Exception("Metadata Request Failed: " . $conn->error);

    $response = ['headers' => [], 'data' => []];
    $fields = $result->fetch_fields();
    foreach ($fields as $field) { $response['headers'][] = $field->name; }
    while ($row = $result->fetch_assoc()) { $response['data'][] = $row; }
    $conn->close();
    echo json_encode($response);
}

function run_query($query, $ro_db_config, $rw_db_config, $db_mode) {
    if (empty(trim($query))) {
        throw new Exception("SQL query cannot be empty.");
    }

    // --- SECURITY FIREWALL: RESTRICT query_history ACCESS ---
    if (preg_match('/(DELETE|DROP|RENAME|ALTER)\s+.*query_history/i', $query)) {
        throw new Exception("Security Restriction: The 'query_history' table is protected. You can only view (SELECT) or clear (TRUNCATE) it.");
    }

    $is_select = preg_match('/^\s*SELECT/i', $query);
    
    try {
        $conn = ($is_select && $db_mode === 'ro') ? db_connect($ro_db_config) : db_connect($rw_db_config);
    } catch (Exception $e) {
        throw new Exception("Database Connection failed: " . $e->getMessage());
    }

    $start = microtime(true);
    $result = $conn->query($query);
    $elapsed = round(microtime(true) - $start, 4);

    $status = $conn->error ? 'failed' : 'success';
    $rowCount = 0;
    if ($result instanceof mysqli_result) {
        $rowCount = $result->num_rows;
    } else {
        $rowCount = $conn->affected_rows;
    }

    // --- LOG TO SHARED HISTORY ---
    if (!preg_match('/TRUNCATE\s+TABLE\s+query_history/i', $query)) {
        try {
            $log_conn = db_connect($rw_db_config);
            $stmt = $log_conn->prepare("INSERT INTO query_history (query_text, status, duration, row_count, db_mode) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssdis", $query, $status, $elapsed, $rowCount, $db_mode);
            $stmt->execute();
            $stmt->close();
            $log_conn->close();
        } catch (Exception $e) {}
    }

    if ($conn->error) {
        $msg = $conn->error;
        $conn->close();
        
        // --- AUTO-CORRECTION SUGGESTION ON ERROR ---
        $correction = perform_auto_correction($query);
        throw new Exception("SQL Error: " . $msg . ($correction ? " | Did you mean: " . $correction : ""));
    }

    $response = [
        'headers' => [],
        'data' => [],
        'execution_time' => $elapsed,
        'affected_rows' => $rowCount,
        'analysis' => perform_static_analysis($query)
    ];

    if ($result instanceof mysqli_result) {
        $fields = $result->fetch_fields();
        foreach ($fields as $field) { $response['headers'][] = $field->name; }
        while ($row = $result->fetch_assoc()) { $response['data'][] = $row; }
        $result->free();
    }

    $conn->close();
    echo json_encode($response);
}

function get_history($db_config, $search = '', $status = '') {
    $conn = db_connect($db_config);
    $sql = "SELECT * FROM query_history WHERE 1=1";
    if (!empty($search)) $sql .= " AND query_text LIKE '%" . $conn->real_escape_string($search) . "%'";
    if (!empty($status)) $sql .= " AND status = '" . $conn->real_escape_string($status) . "'";
    $sql .= " ORDER BY started_at DESC LIMIT 50";
    $result = $conn->query($sql);
    if (!$result) throw new Exception("History Query Failed: " . $conn->error);
    $history = [];
    while ($row = $result->fetch_assoc()) { $history[] = $row; }
    $conn->close();
    echo json_encode(['history' => $history]);
}

// --- ADVANCED HELPER FUNCTIONS ---

function perform_static_analysis($query) {
    $warnings = [];
    if (preg_match('/SELECT\s+\*/i', $query)) $warnings[] = "Using SELECT * can impact performance. Consider selecting specific columns.";
    if (stripos($query, 'SELECT') !== false && stripos($query, 'WHERE') === false) $warnings[] = "Query lacks a WHERE clause; this might return a large dataset.";
    if (stripos($query, 'SELECT') !== false && stripos($query, 'LIMIT') === false) $warnings[] = "Consider adding a LIMIT clause to large queries.";
    return $warnings;
}

/**
 * NEW: AUTO-CORRECTION LOGIC
 * Corrects common syntax typos without changing logic
 */
function perform_auto_correction($query) {
    $original = $query;
    
    // 1. Fix common misspelled keywords
    $replacements = [
        '/\bSELETC\b/i' => 'SELECT',
        '/\bFROMM\b/i'  => 'FROM',
        '/\bWHER\b/i'   => 'WHERE',
        '/\bUDPATE\b/i' => 'UPDATE',
        '/\bINSERTT\b/i'=> 'INSERT',
        '/\bLIMITT\b/i' => 'LIMIT',
        '/\bJOINN\b/i'  => 'JOIN'
    ];
    $query = preg_replace(array_keys($replacements), array_values($replacements), $query);

    // 2. Fix missing space after SELECT
    $query = preg_replace('/SELECT\*/i', 'SELECT *', $query);

    // 3. Fix basic missing semicolon if requested (UI logic usually handles this, but here for API)
    if (substr(trim($query), -1) !== ';') {
        // We don't automatically add it, but we note it in analytics
    }

    return ($original !== $query) ? $query : null;
}

function analyze_query($query) {
    $analysis = perform_static_analysis($query);
    $correction = perform_auto_correction($query);
    echo json_encode([
        'analysis' => $analysis,
        'suggested_correction' => $correction
    ]);
}

function handle_ai_generation($prompt) {
    if (empty(trim($prompt))) throw new Exception("Prompt is empty.");
    $mock = "-- AI Generated for: $prompt\nSELECT * FROM students WHERE grade = 'A' LIMIT 10;";
    echo json_encode(['sql' => $mock]);
}

function test_all_connections($ro, $rw) {
    $report = [];
    try { $c1 = db_connect($ro); $report['ro_db'] = "Connected Successfully"; $c1->close(); } 
    catch (Exception $e) { $report['ro_db'] = "Failed: " . $e->getMessage(); }
    try { $c2 = db_connect($rw); $report['rw_db'] = "Connected Successfully"; $c2->close(); } 
    catch (Exception $e) { $report['rw_db'] = "Failed: " . $e->getMessage(); }
    echo json_encode($report);
}