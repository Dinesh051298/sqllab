<?php
/**
 * SQL Lab Backend API - Skills Builder Hub
 * Centralized Multi-Tenant Database Registry Engine
 */

ini_set('display_errors', 0); 
error_reporting(E_ALL);

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') { 
    http_response_code(200);
    exit; 
}

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

$action = $_GET['action'] ?? '';
$raw_input = file_get_contents('php://input');
$input = json_decode($raw_input, true);

try {
    // Safety guard rail: skip empty check only for dynamic database retrieval mappings
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($raw_input) && $action !== 'get_registered_dbs') {
        throw new Exception("No metadata data matrix packets received.");
    }

    switch ($action) {
        case 'get_registered_dbs':
            get_registered_dbs($rw_db_config);
            break;
            
        // --- ADD THIS CASE RIGHT HERE ---
        case 'verify_db_login':
            resolve_database_context($input, $rw_db_config, $ro_db_config);
            echo json_encode(['success' => true, 'message' => 'Credentials verified.']);
            break;

        case 'register_new_db':
            $student_name = $input['student_name'] ?? 'Anonymous';
            register_new_db($rw_db_config, $input, $student_name);
            break;

        case 'get_tables':
            $active_config = resolve_database_context($input, $rw_db_config, $ro_db_config);
            get_tables($active_config);
            break;

        case 'run_query':
            $query = $input['query'] ?? '';
            $student_name = $input['student_name'] ?? 'Anonymous';
            $db_mode = $input['db_mode'] ?? 'ro';
            $active_config = resolve_database_context($input, $rw_db_config, $ro_db_config);
            run_query_dynamically($query, $active_config, $rw_db_config, $db_mode, $student_name);
            break;


        case 'get_execution_plan':
            $active_config = resolve_database_context($input, $rw_db_config, $ro_db_config);
            get_metadata_query_dynamically("EXPLAIN " . ($input['query'] ?? ''), $active_config);
            break;

        case 'describe_table':
            $active_config = resolve_database_context($input, $rw_db_config, $ro_db_config);
            get_metadata_query_dynamically("DESCRIBE " . ($input['table'] ?? ''), $active_config);
            break;

        case 'generate_sql':
            if (empty(trim($input['prompt'] ?? ''))) throw new Exception("Prompt is empty.");
            echo json_encode(['sql' => "-- AI Generated:\nSELECT * FROM students LIMIT 10;"]);
            break;
            
        case 'get_history':
            // Capture search filtering patterns
            $search_name = $input['student_name'] ?? '';
            get_history($rw_db_config, $search_name);
            break;

        case 'clear_global_history':
            // Verify student identity details or enforce basic truncation workflows
            clear_global_history($rw_db_config);
            break;

        case 'add_query_note':
            $note_query_id = $input['query_history_id'] ?? 0;
            $note_text = $input['note_text'] ?? '';
            $note_student = $input['student_name'] ?? 'Anonymous';
            add_query_note($rw_db_config, $note_query_id, $note_text, $note_student);
            break;

        case 'get_query_notes':
            $note_query_id = $input['query_history_id'] ?? 0;
            get_query_notes($rw_db_config, $note_query_id);
            break;

        default:
            throw new Exception("Unsupported framework command layout.");
    }
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}

function db_connect($config) {
    mysqli_report(MYSQLI_REPORT_OFF);
    $conn = @new mysqli($config['host'], $config['user'], $config['pass'], $config['name']);
    if ($conn->connect_error) {
        throw new Exception("Database Connection Failure: Check routing parameters.");
    }
    $conn->set_charset("utf8mb4");
    return $conn;
}

function resolve_database_context($input, $rw_config, $ro_config) {
    $mode = $input['db_mode'] ?? 'ro';
    $password_attempt = $input['db_pass'] ?? '';

    if ($mode === 'ro') return $ro_config;
    if ($mode === 'rw') return $rw_config;

    if (strpos($mode, 'custom_') === 0) {
        $target_db_name = substr($mode, 7);
        $log_conn = db_connect($rw_config);
        $stmt = $log_conn->prepare("SELECT db_host, db_user, db_password_hash FROM system_custom_databases WHERE db_name = ?");
        $stmt->bind_param("s", $target_db_name);
        $stmt->execute();
        $stmt->bind_result($host, $user, $stored_password);
        
        if (!$stmt->fetch()) {
            $stmt->close();
            $log_conn->close();
            throw new Exception("The selected database configuration workspace does not exist.");
        }
        $stmt->close();
        $log_conn->close();

        if ($password_attempt !== $stored_password) {
            throw new Exception("Authentication Error: Invalid login credentials validation token.");
        }

        return [
            'host' => $host,
            'user' => $user,
            'pass' => $password_attempt,
            'name' => $target_db_name
        ];
    }
    return $ro_config;
}

function get_registered_dbs($rw_config) {
    $conn = db_connect($rw_config);
    $result = $conn->query("SELECT db_name FROM system_custom_databases ORDER BY created_at DESC");
    $list = [];
    while ($row = $result->fetch_array()) { $list[] = $row[0]; }
    $conn->close();
    echo json_encode(['custom_databases' => $list]);
}

function register_new_db($rw_config, $input, $student_name) {
    $host = trim($input['host'] ?? '');
    $name = trim($input['name'] ?? '');
    $user = trim($input['user'] ?? '');
    $pass = trim($input['pass'] ?? '');

    if (empty($host) || empty($name) || empty($user) || empty($pass)) {
        throw new Exception("All registration targets configuration parameters must be filled.");
    }

    $test_conn = @new mysqli($host, $user, $pass, $name);
    if ($test_conn->connect_error) {
        throw new Exception("Handshake Refused: Credentials invalid.");
    }
    $test_conn->close();

    $conn = db_connect($rw_config);
    $stmt = $conn->prepare("INSERT INTO system_custom_databases (db_name, db_user, db_host, db_password_hash, registered_by) VALUES (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE db_user=?, db_host=?, db_password_hash=?, registered_by=?");
    $stmt->bind_param("sssssssss", $name, $user, $host, $pass, $student_name, $user, $host, $pass, $student_name);
    
    if (!$stmt->execute()) {
        $err = $stmt->error;
        $stmt->close();
        $conn->close();
        throw new Exception("Central directory logging trace failure: " . $err);
    }
    $stmt->close();
    $conn->close();

    echo json_encode(['success' => true, 'message' => "Database registered successfully."]);
}

function get_tables($db_config) {
    $conn = db_connect($db_config);
    $result = $conn->query("SHOW TABLES");
    $tables = [];
    while ($row = $result->fetch_array()) { $tables[] = $row[0]; }
    $conn->close();
    echo json_encode(['tables' => $tables]);
}

function get_metadata_query_dynamically($query, $resolved_config) {
    $conn = db_connect($resolved_config);
    $result = $conn->query($query);
    if (!$result) throw new Exception("Metadata mapping error: " . $conn->error);
    $response = ['headers' => [], 'data' => []];
    foreach ($result->fetch_fields() as $field) { $response['headers'][] = $field->name; }
    while ($row = $result->fetch_assoc()) { $response['data'][] = $row; }
    $conn->close();
    echo json_encode($response);
}

function run_query_dynamically($query, $target_config, $logging_config, $db_mode, $student_name) {
    if (empty(trim($query))) { 
        throw new Exception("SQL query cannot be empty."); 
    }
    // Security Restriction Guardrail: Blanket ban on targeting administrative infrastructure tables
    if (preg_match('/\b(query_history|system_custom_databases)\b/i', $query)) {
        throw new Exception("Security Restriction: Access to protected internal system catalog tables is denied by Skills Builder Hub!");
    }
        
    $user_sql_error = ''; $elapsed = 0.0; $rowCount = 0; $headers = []; $data = [];
    
    try {
        $conn = db_connect($target_config);
        $start = microtime(true);
        $result = @$conn->query($query);
        $elapsed = round(microtime(true) - $start, 4);
        
        if ($conn->error) { 
            $user_sql_error = (string)$conn->error; 
        } else {
            $rowCount = ($result instanceof mysqli_result) ? $result->num_rows : $conn->affected_rows;
            if ($result instanceof mysqli_result) {
                foreach ($result->fetch_fields() as $field) { $headers[] = $field->name; }
                while ($row = $result->fetch_assoc()) { $data[] = $row; }
                $result->free();
            }
        }
        $conn->close();
    } catch (Exception $ex) { 
        $user_sql_error = $ex->getMessage(); 
    }
    
    $status = (!empty($user_sql_error)) ? 'failed' : 'success';
    
    try {
        $log_conn = @new mysqli($logging_config['host'], $logging_config['user'], $logging_config['pass'], $logging_config['name']);
        if (!$log_conn->connect_error) {
            $log_conn->set_charset("utf8mb4");
            $stmt = $log_conn->prepare("INSERT INTO query_history (student_name, query_text, status, error_log, duration, row_count, db_mode) VALUES (?, ?, ?, ?, ?, ?, ?)");
            if ($stmt) {
                $clean_err = !empty($user_sql_error) ? $user_sql_error : null;
                $elapsed_str = (string)$elapsed;
                $row_count_str = (string)$rowCount;
                $stmt->bind_param("sssssss", $student_name, $query, $status, $clean_err, $elapsed_str, $row_count_str, $db_mode);
                $stmt->execute(); 
                $stmt->close();
            }
            $log_conn->close();
        }
    } catch (Exception $e) {
        // Fail-silent logging telemetry fallback block
    }
    
    echo json_encode([
        'success' => empty($user_sql_error), 
        'sql_error' => $user_sql_error, 
        'headers' => $headers, 
        'data' => $data, 
        'execution_time' => (float)$elapsed, 
        'affected_rows' => (int)$rowCount, 
        'suggested_correction' => perform_auto_correction($query)
    ]);
}

function perform_auto_correction($query) {
    $original = $query;
    $replacements = [
        '/\bSELETC\b/i' => 'SELECT', '/\bFROMM\b/i' => 'FROM', '/\bWHER\b/i' => 'WHERE',
        '/\bUDPATE\b/i' => 'UPDATE', '/\bINSERTT\b/i'=> 'INSERT', '/\bLIMITT\b/i' => 'LIMIT'
    ];
    $query = preg_replace(array_keys($replacements), array_values($replacements), $query);
    return ($original !== $query) ? $query : null;
}

function get_history($db_config, $search = '', $status = '', $student_name = '') {
    $conn = db_connect($db_config); //[cite: 2]

    $filter_target = !empty($student_name) ? $student_name : $search;

    // 1. Calculate TOTAL logs absolute metric (Before any filters)
    $total_res = $conn->query("SELECT COUNT(*) FROM query_history"); //[cite: 2]
    $total_count = $total_res ? $total_res->fetch_row()[0] : 0;

    // 2. Build the filter condition so we can reuse it
    $where_clause = " WHERE 1=1";
    if (!empty($filter_target)) {
        $esc = $conn->real_escape_string($filter_target);
        $where_clause .= " AND (qh.student_name LIKE '%$esc%' OR qh.id IN (SELECT query_history_id FROM query_notes WHERE note_text LIKE '%$esc%'))";
    }

    // 3. NEW: Calculate true MATCHING count (After Filter, but before the LIMIT cuts it off)
    $matching_res = $conn->query("SELECT COUNT(*) FROM query_history qh" . $where_clause);
    $matching_count = $matching_res ? $matching_res->fetch_row()[0] : 0;

    // 4. Fetch the limited records for display page
    $sql = "SELECT qh.id, qh.student_name, qh.query_text, qh.status, qh.error_log, qh.duration, qh.row_count, qh.db_mode, qh.started_at,
            (SELECT note_text FROM query_notes WHERE query_history_id = qh.id ORDER BY created_at DESC LIMIT 1) AS latest_note,
            (SELECT COUNT(*) FROM query_notes WHERE query_history_id = qh.id) AS note_count
            FROM query_history qh" . $where_clause; //[cite: 2]
    $sql .= " ORDER BY qh.started_at DESC LIMIT 2000"; //[cite: 2]

    $result = $conn->query($sql); //[cite: 2]
    $history = []; //[cite: 2]
    while ($row = $result->fetch_assoc()) { //[cite: 2]
        $history[] = $row; //[cite: 2]
    }
    
    $conn->close(); //[cite: 2]
    
    // Pass both the absolute total and the exact matching count to the frontend
    echo json_encode([
        'history' => $history,
        'records_before_filter' => (int)$total_count,
        'records_after_filter' => (int)$matching_count
    ]);
}

function clear_global_history($db_config) {
    $conn = db_connect($db_config);
    // Execute a clean system flush operation
    if (!$conn->query("TRUNCATE TABLE query_history")) {
        throw new Exception("Clear process rejected: " . $conn->error);
    }
    $conn->close();
    echo json_encode(['success' => true, 'message' => 'Global logs wiped successfully.']);
}

function add_query_note($db_config, $query_history_id, $note_text, $student_name) {
    $query_history_id = (int)$query_history_id;
    $note_text = trim($note_text);
    if ($query_history_id <= 0) throw new Exception("Invalid history record id.");
    if ($note_text === '') throw new Exception("Note cannot be empty.");

    $conn = db_connect($db_config);
    $stmt = $conn->prepare("INSERT INTO query_notes (query_history_id, student_name, note_text) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $query_history_id, $student_name, $note_text);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    echo json_encode(['success' => true, 'message' => 'Note saved.']);
}

function get_query_notes($db_config, $query_history_id) {
    $query_history_id = (int)$query_history_id;
    if ($query_history_id <= 0) throw new Exception("Invalid history record id.");

    $conn = db_connect($db_config);
    $stmt = $conn->prepare("SELECT student_name, note_text, created_at FROM query_notes WHERE query_history_id = ? ORDER BY created_at DESC");
    $stmt->bind_param("i", $query_history_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $notes = [];
    while ($row = $result->fetch_assoc()) {
        $notes[] = $row;
    }
    $stmt->close();
    $conn->close();
    echo json_encode(['notes' => $notes]);
}

?>