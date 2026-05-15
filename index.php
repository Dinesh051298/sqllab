<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional SQL Practice Lab | Skills Builder Hub</title>

    <!-- 
        EXTERNAL FRAMEWORKS & LIBRARIES 
    -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- CodeMirror Core -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/theme/dracula.min.css">
    
    <!-- IntelliSense/Autocomplete Addons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/addon/hint/show-hint.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/sql/sql.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/addon/hint/show-hint.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/addon/hint/sql-hint.min.js"></script>

    <!-- Charts and Analytics -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Roboto+Mono:wght@400;500&display=swap');

        :root {
            --tokyo-bg: #1a1b26;
            --tokyo-card: #24283b;
            --tokyo-border: #414868;
            --tokyo-accent: #7aa2f7;
            --tokyo-success: #9ece6a;
            --tokyo-error: #f7768e;
            --tokyo-warn: #e0af68;
            --tokyo-comment: #565f89;
            --tokyo-text: #c0caf5;
            --tokyo-text-bright: #ffffff;
            --tokyo-panel: #16161e;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--tokyo-bg);
            color: var(--tokyo-text);
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* --- Enhanced Navbar --- */
        .navbar {
            background-color: rgba(31, 35, 53, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--tokyo-border);
            padding: 0.75rem 1.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.4);
        }

        .navbar-brand { font-weight: 700; color: var(--tokyo-accent) !important; letter-spacing: -0.5px; }

        /* --- CodeMirror Premium Look --- */
        .CodeMirror {
            border: 1px solid var(--tokyo-border);
            border-radius: 0.75rem;
            height: 420px;
            font-family: 'Roboto Mono', monospace;
            font-size: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.5);
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .CodeMirror-focused { 
            border-color: var(--tokyo-accent); 
            box-shadow: 0 0 0 4px rgba(122, 162, 247, 0.15);
        }
        .cm-s-dracula.CodeMirror { background-color: var(--tokyo-panel); }

        /* Autocomplete UI Styling */
        .CodeMirror-hints {
            background: var(--tokyo-card) !important;
            border: 1px solid var(--tokyo-accent) !important;
            border-radius: 8px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.6);
            padding: 8px 0;
            z-index: 9999;
        }
        .CodeMirror-hint { color: var(--tokyo-text) !important; padding: 10px 18px !important; font-size: 13px; border-bottom: 1px solid rgba(255,255,255,0.03); }
        .CodeMirror-hint-active { background-color: var(--tokyo-accent) !important; color: #000 !important; font-weight: 600; }

        /* Layout Component UI */
        .card {
            background-color: var(--tokyo-card);
            border: 1px solid var(--tokyo-border);
            border-radius: 1.25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            overflow: hidden;
        }

        .accordion-item {
            background-color: transparent;
            border: 1px solid var(--tokyo-border);
            margin-bottom: 0.5rem;
            border-radius: 0.75rem !important;
        }

        .accordion-button {
            background-color: var(--tokyo-card);
            color: var(--tokyo-text);
            font-weight: 600;
            border-radius: 0.75rem !important;
        }

        .accordion-button:not(.collapsed) {
            background-color: rgba(122, 162, 247, 0.1);
            color: var(--tokyo-accent);
            box-shadow: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #7aa2f7, #bb9af7);
            border: none;
            padding: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            border-radius: 0.75rem;
            box-shadow: 0 4px 15px rgba(122, 162, 247, 0.3);
            transition: all 0.3s ease;
        }
        .btn-primary:hover { filter: brightness(1.15); transform: translateY(-2px); box-shadow: 0 8px 25px rgba(122, 162, 247, 0.5); }

        /* Data Terminal & Visible Text Strategy */
        .table-container {
            max-height: 600px;
            overflow-y: auto;
            border-radius: 0.75rem;
            border: 1px solid var(--tokyo-border);
            background: var(--tokyo-panel);
        }
        
        .table { 
            --bs-table-bg: transparent; 
            color: #e0e0e0; /* High visibility contrast */
            margin-bottom: 0; 
            font-size: 0.95rem;
        }

        .table thead th { 
            background-color: #1f2335; 
            color: var(--tokyo-accent); 
            font-weight: 700; 
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            padding: 15px;
            position: sticky; 
            top: 0; 
            z-index: 10; 
            border-bottom: 2px solid var(--tokyo-border); 
        }

        .table tbody td {
            padding: 12px 15px;
            border-bottom: 1px solid rgba(65, 72, 104, 0.5);
            font-family: 'Inter', sans-serif;
            vertical-align: middle;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(122, 162, 247, 0.05);
            color: var(--tokyo-text-bright);
        }

        .analytics-card {
            background: rgba(122, 162, 247, 0.07);
            border: 1px solid rgba(122, 162, 247, 0.2);
            border-left: 4px solid var(--tokyo-accent);
            padding: 15px 25px;
            margin-bottom: 20px;
            border-radius: 12px;
        }

        .performance-badge {
            font-size: 0.7rem;
            padding: 5px 12px;
            border-radius: 50px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .sql-history-code {
            color: var(--tokyo-accent);
            font-family: 'Roboto Mono', monospace;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 350px;
            display: block;
            background: #0f1016;
            padding: 6px 12px;
            border-radius: 6px;
            border: 1px solid rgba(122, 162, 247, 0.1);
        }

        .status-pill { width: 10px; height: 10px; border-radius: 50%; display: inline-block; margin-right: 8px; }
        .status-success { background-color: var(--tokyo-success); box-shadow: 0 0 10px var(--tokyo-success); }
        .status-failed { background-color: var(--tokyo-error); box-shadow: 0 0 10px var(--tokyo-error); }

        .schema-btn { padding: 4px 8px; font-size: 0.8rem; border: 1px solid transparent; border-radius: 4px; color: var(--tokyo-comment); }
        .schema-btn:hover { color: var(--tokyo-accent); border-color: var(--tokyo-border); background: rgba(122, 162, 247, 0.05); }

        .nav-tabs { border-bottom: 1px solid var(--tokyo-border); gap: 10px; padding: 0 10px; }
        .nav-tabs .nav-link { 
            color: var(--tokyo-comment); 
            border: none; 
            border-radius: 0.5rem 0.5rem 0 0;
            font-weight: 700; 
            font-size: 0.85rem;
            padding: 12px 20px;
            transition: all 0.3s;
        }
        .nav-tabs .nav-link:hover { color: var(--tokyo-text); background: rgba(255,255,255,0.03); }
        .nav-tabs .nav-link.active { 
            background: rgba(122, 162, 247, 0.15); 
            color: var(--tokyo-accent); 
            border-bottom: 3px solid var(--tokyo-accent); 
        }

        /* Modal Customization */
        .modal-content {
            border-radius: 1.5rem;
            border: 1px solid var(--tokyo-border);
            box-shadow: 0 25px 50px rgba(0,0,0,0.6);
        }

        /* --- Scrollbar Customization --- */
        ::-webkit-scrollbar { width: 10px; height: 10px; }
        ::-webkit-scrollbar-track { background: var(--tokyo-bg); }
        ::-webkit-scrollbar-thumb { background: var(--tokyo-border); border-radius: 10px; border: 2px solid var(--tokyo-bg); }
        ::-webkit-scrollbar-thumb:hover { background: var(--tokyo-accent); }

        @keyframes pulse {
            0% { transform: scale(0.95); opacity: 0.8; }
            50% { transform: scale(1); opacity: 1; }
            100% { transform: scale(0.95); opacity: 0.8; }
        }

    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <i class="bi bi-database-fill-gear me-3 fs-3"></i> 
                <div>
                    <span class="d-block lh-1">SQL LAB PRO</span>
                    <small class="fw-light text-white-50" style="font-size: 10px; letter-spacing: 2px;">SKILLS BUILDER HUB</small>
                </div>
            </a>
            <div class="ms-auto d-flex align-items-center gap-4">
                 <div id="connection-indicator" class="small text-success d-none d-md-flex align-items-center fw-medium">
                    <i class="bi bi-circle-fill me-2" style="font-size: 8px; animation: pulse 2s infinite;"></i> DB CONNECTED
                 </div>
                 <div class="vr bg-secondary d-none d-md-block" style="height: 25px; opacity: 0.3;"></div>
                 <select id="db-mode-select" class="form-select form-select-sm bg-dark text-white border-secondary" style="width: auto; cursor: pointer; border-radius: 8px;">
                     <option value="ro" selected>Read-Only (Main DB)</option>
                     <option value="rw">Read-Write (Sandbox)</option>
                 </select>
            </div>
        </div>
    </nav>

    <div class="container-fluid p-4">
        <div class="row g-4">
            <!-- Sidebar: Schema, Quiz, History -->
            <div class="col-lg-3">
                <div class="accordion" id="leftPanelAccordion">
                    
                    <!-- Metadata Explorer -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#schema-collapse">
                                <i class="bi bi-diagram-3 me-2 text-info"></i> Object Explorer
                            </button>
                        </h2>
                        <div id="schema-collapse" class="accordion-collapse collapse show" data-bs-parent="#leftPanelAccordion">
                            <div class="accordion-body p-2 bg-dark bg-opacity-25">
                                <div id="schema-list" class="list-group list-group-flush gap-1">
                                    <div class="text-center p-3 small text-white-50">Synchronizing database dictionary...</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- SQL Quiz Assessment -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#quiz-collapse">
                                <i class="bi bi-patch-check me-2 text-warning"></i> Skill Assessment
                            </button>
                        </h2>
                        <div id="quiz-collapse" class="accordion-collapse collapse" data-bs-parent="#leftPanelAccordion">
                            <div class="accordion-body" id="quiz-panel">
                                <!-- Quiz data injected via renderQuizHome() -->
                            </div>
                        </div>
                    </div>

                    <!-- Local Activity Log -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#history-collapse">
                                <i class="bi bi-journal-code me-2 text-success"></i> Session Activity
                            </button>
                        </h2>
                        <div id="history-collapse" class="accordion-collapse collapse" data-bs-parent="#leftPanelAccordion">
                            <div class="accordion-body p-0">
                                <div id="query-history" class="list-group list-group-flush overflow-auto" style="max-height: 350px;">
                                    <div class="p-3 text-center small text-white-50 italic">No activity logged in this session.</div>
                                </div>
                                <div class="p-2 border-top border-secondary bg-dark text-center">
                                    <button id="clear-history-btn" class="btn btn-link btn-sm text-danger text-decoration-none fw-bold">PURGE SESSION DATA</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Workspace: Editor and Results -->
            <div class="col-lg-9">
                <!-- Smart SQL Editor -->
                <div class="card p-4 border-0 shadow-lg mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="m-0 text-info fw-bold font-monospace uppercase tracking-wider">
                            <i class="bi bi-terminal-fill me-2"></i>Query Terminal
                        </h6>
                        <div id="performance-hint" class="small transition-all"></div>
                    </div>
                    
                    <form id="sql-form">
                        <textarea id="sql-editor"></textarea>
                        
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="text-white-50 small d-flex align-items-center gap-2">
                                <span class="badge bg-dark border border-secondary px-2 py-1">CTRL + SPACE</span>
                                <span class="opacity-75">Enable Autocomplete</span>
                            </div>
                            <div class="btn-group shadow-sm">
                                <button type="button" class="btn btn-sm btn-outline-info border-info border-opacity-25" data-bs-toggle="modal" data-bs-target="#aiAssistModal">
                                    <i class="bi bi-magic me-1"></i> AI CONSTRUCTOR
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-danger border-danger border-opacity-25" onclick="editor.setValue('');">
                                    <i class="bi bi-eraser-fill"></i>
                                </button>
                            </div>
                        </div>

                        <button id="run-query-btn" type="submit" class="btn btn-primary btn-lg w-100 mt-3 d-flex align-items-center justify-content-center shadow">
                            <span id="btn-text"><i class="bi bi-play-circle-fill me-2"></i>COMMIT EXECUTION</span>
                            <div id="btn-loader" class="spinner-border spinner-border-sm d-none" role="status"></div>
                        </button>
                    </form>
                </div>

                <!-- Intelligent Output Terminal -->
                <div class="card p-4 border-0 shadow-lg">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="m-0 text-info fw-bold text-uppercase"><i class="bi bi-window-sidebar me-2"></i>Management Console</h6>
                        <button id="download-csv-btn" class="btn btn-sm btn-outline-success d-none border-success border-opacity-25">
                            <i class="bi bi-cloud-download me-1"></i> EXPORT RESULTSET
                        </button>
                    </div>

                    <!-- Performance Stats Overlay -->
                    <div id="execution-analytics" class="d-none analytics-card">
                        <div class="row align-items-center text-center">
                            <div class="col-md-3 border-end border-secondary">
                                <div class="text-white-50 x-small fw-bold">THROUGHPUT</div>
                                <div class="text-white"><b id="stat-speed">0</b> <span class="small">rows/s</span></div>
                            </div>
                            <div class="col-md-3 border-end border-secondary">
                                <div class="text-white-50 x-small fw-bold">LATENCY</div>
                                <div class="text-white"><b id="stat-latency">0</b> <span class="small">ms</span></div>
                            </div>
                            <div class="col-md-3 border-end border-secondary">
                                <div class="text-white-50 x-small fw-bold">IO VOLUME</div>
                                <div class="text-white"><b id="stat-count">0</b> <span class="small">records</span></div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-white-50 x-small mb-1 fw-bold">ENGINE RANKING</div>
                                <span class="performance-badge" id="performance-rank">Analyzing</span>
                            </div>
                        </div>
                    </div>

                    <!-- Tabbed Interface for Engineering Views -->
                    <ul class="nav nav-tabs mb-3" id="outputTabs" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" id="results-tab" data-bs-toggle="tab" data-bs-target="#results-panel" type="button">DATA GRID</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="plan-tab" data-bs-toggle="tab" data-bs-target="#plan-panel" type="button" onclick="fetchExecutionPlan()">PLANNER (EXPLAIN)</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="viz-tab" data-bs-toggle="tab" data-bs-target="#viz-panel" type="button" disabled>ANALYTICS</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="shared-history-tab" data-bs-toggle="tab" data-bs-target="#shared-history-panel" type="button" onclick="fetchSharedHistory()">GLOBAL LOGS</button>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <!-- Data Grid Results -->
                        <div class="tab-pane fade show active" id="results-panel">
                            <div id="msg-area" class="alert alert-secondary small italic text-center py-4 bg-dark bg-opacity-25 border-secondary border-opacity-25">
                                <i class="bi bi-info-circle me-2 text-info"></i> Commit a statement above to populate the data grid.
                            </div>
                            <div id="results-table-container" class="table-container d-none shadow-sm">
                                <table class="table table-hover">
                                    <thead id="results-header"></thead>
                                    <tbody id="results-body"></tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Execution Plan (Optimizer Insights) -->
                        <div class="tab-pane fade" id="plan-panel">
                            <div class="analytics-card mb-3 small bg-dark bg-opacity-50">
                                <i class="bi bi-info-circle text-info me-2"></i> The Query Execution Plan reveals indices utilized, scan counts, and estimated overhead costs.
                            </div>
                            <div class="table-container">
                                <table class="table table-sm table-hover">
                                    <thead id="plan-header" class="table-secondary"></thead>
                                    <tbody id="plan-body"></tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Plotting Engine -->
                        <div class="tab-pane fade" id="viz-panel">
                             <div id="viz-controls" class="row g-3 mb-4 p-4 rounded-4 shadow-inner" style="background-color: #16161e;">
                                <div class="col-md-4">
                                    <label class="form-label text-white-50 x-small fw-bold">VISUAL TYPE</label>
                                    <select id="chart-type-select" class="form-select form-select-sm bg-dark text-white border-secondary"></select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label text-white-50 x-small fw-bold">DIMENSION (X)</label>
                                    <select id="label-col-select" class="form-select form-select-sm bg-dark text-white border-secondary"></select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label text-white-50 x-small fw-bold">METRIC (Y)</label>
                                    <select id="data-col-select" class="form-select form-select-sm bg-dark text-white border-secondary" multiple></select>
                                </div>
                                <div class="col-12 d-grid mt-4">
                                    <button id="update-chart-btn" class="btn btn-outline-info btn-sm fw-bold">RENDER VISUALIZATION</button>
                                </div>
                            </div>
                            <div class="chart-container rounded-4 bg-dark bg-opacity-25 p-3" style="min-height: 400px;">
                                <canvas id="results-chart"></canvas>
                            </div>
                        </div>

                        <!-- Global Shared Activity Feed -->
                        <div class="tab-pane fade" id="shared-history-panel">
                            <div class="table-container border-0">
                                <table class="table table-sm table-hover align-middle">
                                    <thead>
                                        <tr class="text-white-50 x-small text-uppercase">
                                            <th>State</th>
                                            <th>Started At</th>
                                            <th>Latency</th>
                                            <th>Records</th>
                                            <th>Logic Snippet</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody id="shared-history-body"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- AI SQL Synthesis Modal -->
    <div class="modal fade" id="aiAssistModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-info border-opacity-25 shadow-2xl" style="background-color: var(--tokyo-card);">
                <div class="modal-header border-secondary border-opacity-25">
                    <h6 class="modal-title text-info fw-bold"><i class="bi bi-magic me-2"></i>SQL ARCHITECT ENGINE</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="text-white-50 small mb-3">Define your business requirement in natural language. The engine will synthesize a valid and optimized MySQL statement.</p>
                    <textarea id="ai-prompt" class="form-control bg-black text-info border-secondary font-monospace" rows="5" placeholder="e.g. Calculate the year-over-year growth percentage..."></textarea>
                    <div id="ai-error" class="text-danger small mt-2 d-none font-monospace"></div>
                </div>
                <div class="modal-footer border-secondary border-opacity-25">
                    <button type="button" class="btn btn-dark btn-sm px-3 shadow" data-bs-dismiss="modal">CANCEL</button>
                    <button type="button" class="btn btn-info btn-sm px-4 fw-bold text-white shadow-lg" id="generate-ai-query-btn">
                        <span id="ai-btn-text">SYNTHESIZE SQL</span>
                        <div id="ai-btn-loader" class="spinner-border spinner-border-sm d-none" role="status"></div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        /**
         * SQL LAB PRO - Client Engine v2.0
         * Logic remains identical as per instructions.
         */

        const API_ENDPOINT = 'api.php';
        let currentResults = { headers: [], data: [] };
        let queryHistory = JSON.parse(localStorage.getItem('sqlLabHistory')) || [];
        let resultsChart = null;
        let dbMode = 'ro'; 
        let dbTables = {}; 

        async function fetchAPI(action, body) {
            try {
                const payload = { ...body, db_mode: dbMode };
                const baseUrl = window.location.origin + window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/') + 1);
                const targetUrl = `${baseUrl}${API_ENDPOINT}?action=${encodeURIComponent(action)}`;
                const response = await fetch(targetUrl, { 
                    method: 'POST', 
                    headers: { 'Content-Type': 'application/json' }, 
                    body: JSON.stringify(payload) 
                });
                if (!response.ok) {
                    const errorJson = await response.json().catch(() => ({}));
                    throw new Error(errorJson.error || `Server Error ${response.status}`);
                }
                const result = await response.json();
                if (result.error) throw new Error(result.error);
                return result;
            } catch (error) { 
                console.error(`[CRITICAL] API [${action}] failed:`, error);
                throw error; 
            }
        }

        const editor = CodeMirror.fromTextArea(document.getElementById('sql-editor'), { 
            mode: 'text/x-mysql', 
            theme: 'dracula', 
            lineNumbers: true, 
            autofocus: true, 
            lineWrapping: true, 
            smartIndent: true,
            indentUnit: 4,
            matchBrackets: true,
            autoCloseBrackets: true,
            extraKeys: {
                "Ctrl-Space": "autocomplete",
                "Ctrl-Enter": () => executeQuery(),
                "Cmd-Enter": () => executeQuery()
            },
            hintOptions: { tables: dbTables }
        });

        editor.on("inputRead", function(cm, change) {
            if (change.text[0].match(/[a-z0-9._]/i)) {
                cm.showHint({ completeSingle: false });
            }
        });

        editor.on('change', () => {
            const code = editor.getValue().toLowerCase().trim();
            const hint = document.getElementById('performance-hint');
            if(!code) { hint.innerHTML = ''; return; }
            if (code.includes('delete') && !code.includes('where')) {
                hint.innerHTML = '<span class="text-danger fw-bold shadow-sm px-2 py-1 rounded bg-black border border-danger border-opacity-25"><i class="bi bi-shield-lock-fill me-1"></i> CRITICAL: Unscoped DELETE!</span>';
            } else if (code.includes('update') && !code.includes('where')) {
                hint.innerHTML = '<span class="text-danger fw-bold shadow-sm px-2 py-1 rounded bg-black border border-danger border-opacity-25"><i class="bi bi-exclamation-triangle-fill me-1"></i> RISK: No WHERE clause!</span>';
            } else if (code.includes('select *')) {
                hint.innerHTML = '<span class="text-info fw-bold shadow-sm px-2 py-1 rounded bg-black border border-info border-opacity-25"><i class="bi bi-speedometer me-1"></i> TIP: Project specific columns.</span>';
            } else {
                hint.innerHTML = '<span class="text-success small opacity-75"><i class="bi bi-check2-circle"></i> SQL Syntax valid.</span>';
            }
        });

        window.addEventListener('load', () => { 
            fetchTables(); 
            renderHistory(); 
            renderQuizHome(); 
        });
        
        document.getElementById('db-mode-select').addEventListener('change', (e) => {
            dbMode = e.target.value;
            fetchTables();
        });

        async function fetchTables() {
            try {
                const result = await fetchAPI('get_tables', {});
                const list = document.getElementById('schema-list');
                list.innerHTML = '';
                dbTables = {};
                if (!result.tables || result.tables.length === 0) {
                    list.innerHTML = '<div class="text-white-50 text-center p-4 small italic">Dictionary is empty.</div>';
                    return;
                }
                result.tables.forEach(tableName => {
                    dbTables[tableName] = [];
                    const row = document.createElement('div');
                    row.className = 'd-flex justify-content-between align-items-center p-1 rounded-2 transition-all hover-bg-dark';
                    row.innerHTML = `
                        <button class="btn btn-outline-secondary text-start btn-sm flex-grow-1 me-1 text-truncate border-0 font-monospace" 
                                onclick="editor.setValue('SELECT * FROM \\\`${tableName}\\\` LIMIT 100;'); editor.focus();">
                            <i class="bi bi-table text-info me-2 opacity-50"></i>${tableName}
                        </button>
                        <div class="schema-btn-group">
                            <button class="btn schema-btn" onclick="profileTable('${tableName}')">
                                <i class="bi bi-info-circle"></i>
                            </button>
                        </div>
                    `;
                    list.appendChild(row);
                });
                editor.setOption("hintOptions", { tables: dbTables });
                document.getElementById('connection-indicator').classList.remove('d-none');
            } catch (error) { 
                document.getElementById('schema-list').innerHTML = `<div class="alert alert-danger x-small">sync failed.</div>`; 
            }
        }

        async function executeQuery() {
            const query = editor.getValue().trim();
            if (!query) return;
            setButtonLoading(true, document.getElementById('btn-text'), document.getElementById('btn-loader'));
            document.getElementById('execution-analytics').classList.add('d-none');
            const msgArea = document.getElementById('msg-area');
            msgArea.className = "alert alert-info small py-3 text-center bg-info bg-opacity-10 border-info border-opacity-25";
            msgArea.innerHTML = '<div class="spinner-border spinner-border-sm me-2"></div> Committing transaction...';
            try {
                const result = await fetchAPI('run_query', { query });
                currentResults = result;
                const duration = parseFloat(result.execution_time);
                document.getElementById('execution-analytics').classList.remove('d-none');
                document.getElementById('stat-speed').innerText = duration > 0 ? Math.round(result.data.length/duration) : result.data.length;
                document.getElementById('stat-latency').innerText = Math.round(duration * 1000);
                document.getElementById('stat-count').innerText = result.data.length;
                const rank = document.getElementById('performance-rank');
                if(duration < 0.1) { rank.innerText = 'High Speed'; rank.className = 'performance-badge bg-success text-white'; }
                else if(duration < 0.5) { rank.innerText = 'Optimal'; rank.className = 'performance-badge bg-primary text-white'; }
                else { rank.innerText = 'Sub-Optimal'; rank.className = 'performance-badge bg-warning text-dark'; }
                addToHistory(query);
                displayResults(result.headers, result.data);
                if (dbMode === 'rw' && !/^\s*SELECT/i.test(query)) { fetchTables(); }
            } catch (error) { displayMessage('error', error.message); } 
            finally { setButtonLoading(false, document.getElementById('btn-text'), document.getElementById('btn-loader')); }
        }

        async function fetchExecutionPlan() {
            const query = editor.getValue().trim();
            const header = document.getElementById('plan-header');
            const body = document.getElementById('plan-body');
            if(!query || !/^\s*SELECT/i.test(query)) { body.innerHTML = '<tr><td class="p-4 text-center text-white-50 italic">Select a DQL statement.</td></tr>'; return; }
            body.innerHTML = '<tr><td class="p-4 text-center"><div class="spinner-border spinner-border-sm text-info me-2"></div> Analysing...</td></tr>';
            try {
                const res = await fetchAPI('get_execution_plan', { query });
                header.innerHTML = `<tr>${res.headers.map(h => `<th>${h}</th>`).join('')}</tr>`;
                body.innerHTML = res.data.map(r => `<tr>${res.headers.map(h => `<td>${r[h] ?? 'NULL'}</td>`).join('')}</tr>`).join('');
            } catch(e) { body.innerHTML = `<tr><td class="text-danger p-4 text-center">${e.message}</td></tr>`; }
        }

        async function profileTable(table) {
            bootstrap.Tab.getOrCreateInstance(document.getElementById('plan-tab')).show();
            const header = document.getElementById('plan-header');
            const body = document.getElementById('plan-body');
            body.innerHTML = '<tr><td class="p-4 text-center">Cataloging...</td></tr>';
            try {
                const res = await fetchAPI('describe_table', { table });
                header.innerHTML = `<tr>${res.headers.map(h => `<th>${h}</th>`).join('')}</tr>`;
                body.innerHTML = res.data.map(r => `<tr>${res.headers.map(h => `<td>${r[h] ?? 'NULL'}</td>`).join('')}</tr>`).join('');
            } catch(e) { body.innerHTML = `<td class="text-danger p-4">${e.message}</td>`; }
        }

        async function fetchSharedHistory() {
            const body = document.getElementById('shared-history-body');
            body.innerHTML = '<tr><td colspan="6" class="text-center p-5">Syncing...</td></tr>';
            try {
                const data = await fetchAPI('get_history', {});
                if (!data.history || data.history.length === 0) { body.innerHTML = '<tr><td colspan="6" class="p-5 text-center text-white-50">Empty.</td></tr>'; return; }
                body.innerHTML = data.history.map(h => `
                    <tr>
                        <td class="text-center"><i class="status-pill ${h.status === 'success' ? 'status-success' : 'status-failed'}"></i></td>
                        <td class="small text-white-50 font-monospace">${new Date(h.started_at).toLocaleString()}</td>
                        <td class="small text-info">${h.duration}s</td>
                        <td><span class="badge bg-secondary rounded-pill">${h.row_count}</span></td>
                        <td><code class="sql-history-code">${h.query_text}</code></td>
                        <td><button class="btn btn-sm btn-info text-white" onclick="loadSQLToEditor('${btoa(h.query_text)}')">LOAD</button></td>
                    </tr>`).join('');
            } catch(e) { body.innerHTML = '<tr><td colspan="6" class="text-danger">Sync error.</td></tr>'; }
        }

        function loadSQLToEditor(base64Sql) {
            editor.setValue(atob(base64Sql));
            bootstrap.Tab.getInstance(document.getElementById('results-tab')).show();
            editor.focus();
        }

        let quizState = { currentSet: null, currentQuestionIndex: 0, score: 0, timer: 0, timerId: null };
        const quizzes = [
            { name: "MySQL Logic & Set Theory", questions: [ { q: "Select records from 'Students' where grade is 'A'?", o: ["SELECT * FROM Students WHERE grade = 'A'", "GET Students SET grade = 'A'"], a: 0 } ] }
        ];

        function renderQuizHome() {
            if (quizState.timerId) clearInterval(quizState.timerId);
            const panel = document.getElementById('quiz-panel');
            panel.innerHTML = `
                <div id="quiz-selection-area">
                    <div id="quiz-set-buttons" class="d-grid gap-2"></div>
                </div>
                <div id="quiz-main-area" class="d-none">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div id="quiz-timer" class="fw-bold text-warning font-monospace small"></div>
                        <div id="quiz-score-badge" class="badge bg-secondary">PTS: 0</div>
                    </div>
                    <div id="quiz-question" class="small mb-4 border-start border-info border-3 ps-3 text-info"></div>
                    <div id="quiz-options" class="d-grid gap-2"></div>
                    <div id="quiz-summary" class="text-center d-none mt-3"></div>
                </div>`;
            const quizSetButtons = document.getElementById('quiz-set-buttons');
            quizSetButtons.innerHTML = quizzes.map((quiz, index) => `
                <button class="btn btn-outline-info btn-sm text-start py-2 px-3" onclick="startQuiz(${index})">${quiz.name}</button>`).join('');
        }

        function startQuiz(setIndex) {
            quizState = { currentSet: quizzes[setIndex], currentQuestionIndex: 0, score: 0, timer: 120, timerId: setInterval(updateQuizTimer, 1000) };
            document.getElementById('quiz-selection-area').classList.add('d-none');
            document.getElementById('quiz-main-area').classList.remove('d-none');
            renderQuestion();
        }

        function updateQuizTimer() {
            const timerEl = document.getElementById('quiz-timer');
            const minutes = Math.floor(quizState.timer / 60);
            const seconds = quizState.timer % 60;
            timerEl.innerHTML = `<i class="bi bi-stopwatch"></i> ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            if (quizState.timer > 0) quizState.timer--;
            else showQuizSummary(true);
        }

        function renderQuestion() {
            const q = quizState.currentSet.questions[quizState.currentQuestionIndex];
            document.getElementById('quiz-question').innerText = q.q;
            document.getElementById('quiz-options').innerHTML = q.o.map((option, index) => `
                <button class="btn btn-sm btn-outline-secondary text-start py-2" onclick="selectAnswer(${index}, this)">${option}</button>`).join('');
        }

        function selectAnswer(selectedIndex, buttonElement) {
            const isCorrect = selectedIndex === quizState.currentSet.questions[quizState.currentQuestionIndex].a;
            buttonElement.classList.add(isCorrect ? 'bg-success' : 'bg-danger', 'text-white', 'border-0');
            if (isCorrect) { quizState.score++; document.getElementById('quiz-score-badge').innerText = `PTS: ${quizState.score}`; }
            setTimeout(() => {
                quizState.currentQuestionIndex++;
                if (quizState.currentQuestionIndex < quizState.currentSet.questions.length) renderQuestion();
                else showQuizSummary();
            }, 800);
        }

        function showQuizSummary(timesUp = false) {
            clearInterval(quizState.timerId);
            const summaryEl = document.getElementById('quiz-summary');
            summaryEl.classList.remove('d-none');
            document.getElementById('quiz-question').innerHTML = '';
            document.getElementById('quiz-options').innerHTML = '';
            summaryEl.innerHTML = `<div class="display-6 fw-bold mb-4">${quizState.score}/${quizState.currentSet.questions.length}</div><button class="btn btn-primary btn-sm px-5" onclick="renderQuizHome()">RETRY</button>`;
        }

        function displayResults(headers, data) {
            if (data.length === 0) { displayMessage('info', 'Command executed successfully. 0 records.'); return; }
            document.getElementById('msg-area').classList.add('d-none');
            document.getElementById('results-table-container').classList.remove('d-none');
            document.getElementById('download-csv-btn').classList.remove('d-none');
            document.getElementById('viz-tab').disabled = false;
            document.getElementById('results-header').innerHTML = `<tr>${headers.map(h => `<th>${h}</th>`).join('')}</tr>`;
            document.getElementById('results-body').innerHTML = data.map(row => `
                <tr>${headers.map(h => `<td>${row[h] ?? '<span class="text-white-50 x-small italic">NULL</span>'}</td>`).join('')}</tr>`).join('');
            populateVisualizationControls(headers, data);
        }

        function displayMessage(type, text) {
            const area = document.getElementById('msg-area');
            area.classList.remove('d-none', 'alert-secondary', 'alert-danger', 'alert-info');
            area.className = `alert alert-${type === 'error' ? 'danger' : 'info'} small py-4 px-4`;
            area.innerHTML = `<div><b class="text-uppercase">Engine ${type}</b><br><span class="opacity-75">${text}</span></div>`;
            document.getElementById('results-table-container').classList.add('d-none');
            document.getElementById('download-csv-btn').classList.add('d-none');
        }

        function setButtonLoading(isLoading, textEl, loaderEl) {
            textEl.classList.toggle('d-none', isLoading);
            loaderEl.classList.toggle('d-none', !isLoading);
            textEl.parentElement.disabled = isLoading;
        }

        function addToHistory(query) {
            if (!queryHistory.includes(query)) {
                queryHistory.unshift(query);
                if (queryHistory.length > 50) queryHistory.pop();
                localStorage.setItem('sqlLabHistory', JSON.stringify(queryHistory));
                renderHistory();
            }
        }

        function renderHistory() {
            const container = document.getElementById('query-history');
            if (queryHistory.length === 0) { container.innerHTML = '<div class="p-3 small text-white-50">Empty.</div>'; return; }
            container.innerHTML = queryHistory.map(q => `
                <button class="list-group-item list-group-item-action py-2 small text-truncate bg-transparent border-0" 
                        onclick="editor.setValue(\`${q}\`); editor.focus();">
                    <i class="bi bi-chevron-right me-2 text-info opacity-50"></i>${q}
                </button>`).join('');
        }

        function populateVisualizationControls(headers, data) {
            const labelSelect = document.getElementById('label-col-select');
            const dataSelect = document.getElementById('data-col-select');
            const typeSelect = document.getElementById('chart-type-select');
            labelSelect.innerHTML = headers.map(h => `<option value="${h}">${h}</option>`).join('');
            dataSelect.innerHTML = headers.filter(h => !isNaN(parseFloat(data[0]?.[h]))).map(h => `<option value="${h}">${h}</option>`).join('');
            typeSelect.innerHTML = [ {v: 'bar', n: 'BAR CHART'}, {v: 'line', n: 'LINE CHART'}, {v: 'pie', n: 'PIE CHART'} ].map(t => `<option value="${t.v}">${t.n}</option>`).join('');
            if (dataSelect.options.length > 0) dataSelect.options[0].selected = true;
        }

        document.getElementById('update-chart-btn').onclick = () => {
            if (resultsChart) resultsChart.destroy();
            resultsChart = new Chart(document.getElementById('results-chart'), {
                type: document.getElementById('chart-type-select').value,
                data: {
                    labels: currentResults.data.map(r => r[document.getElementById('label-col-select').value]),
                    datasets: Array.from(document.getElementById('data-col-select').selectedOptions).map((col, i) => ({
                        label: col.value,
                        data: currentResults.data.map(r => parseFloat(r[col.value])),
                        backgroundColor: `hsla(${i * 85}, 70%, 55%, 0.6)`,
                        borderColor: `hsla(${i * 85}, 70%, 55%, 1)`,
                        borderWidth: 2
                    }))
                },
                options: { responsive: true, maintainAspectRatio: false }
            });
        };

        document.getElementById('run-query-btn').onclick = (e) => { e.preventDefault(); executeQuery(); };
        document.getElementById('clear-history-btn').onclick = () => { queryHistory = []; localStorage.removeItem('sqlLabHistory'); renderHistory(); };

        document.getElementById('download-csv-btn').onclick = () => {
            const headers = currentResults.headers;
            const data = currentResults.data;
            const csv = [headers.join(','), ...data.map(r => headers.map(h => `"${(r[h]??'').toString().replace(/"/g,'""')}"`).join(','))].join('\n');
            const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url; a.download = 'results.csv';
            a.click();
        };

        document.getElementById('generate-ai-query-btn').onclick = async () => {
            const prompt = document.getElementById('ai-prompt').value.trim();
            const loader = document.getElementById('ai-btn-loader');
            const text = document.getElementById('ai-btn-text');
            const err = document.getElementById('ai-error');
            if(!prompt) return;
            err.classList.add('d-none'); text.classList.add('d-none'); loader.classList.remove('d-none');
            try {
                const res = await fetchAPI('generate_sql', { prompt });
                editor.setValue(res.sql);
                bootstrap.Modal.getInstance(document.getElementById('aiAssistModal')).hide();
            } catch(e) { err.innerText = e.message; err.classList.remove('d-none'); } 
            finally { text.classList.remove('d-none'); loader.classList.add('d-none'); }
        };
    </script>
</body>
</html>