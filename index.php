<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Lab Online: Free MySQL Practice & Editor | Skills Builder Hub</title>
    <meta name="title" content="SQL Lab Online: Free MySQL Practice & Editor | Skills Builder Hub">
    <meta name="description" content="Master SQL with our free online SQL practice lab. Features MySQL sandbox, real-time query execution, AI-powered SQL generator, and execution planner.">
    <meta name="keywords" content="SQL practice lab, online sql editor, free mysql sandbox, learn sql, sql query optimizer, skills builder hub">
    
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://skillsbuilderhub.com/sqllab/">
    <meta property="og:title" content="SQL Lab Online: Free MySQL Practice & Editor">
    <meta property="og:description" content="Test MySQL queries in real-time with our advanced IDE. Includes AI synthesis and execution plans.">
    <meta property="og:image" content="https://dineshperiyasamy.com/assets/images/sql-lab-preview.png">
    
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "SoftwareApplication",
      "name": "SQL Lab Pro",
      "operatingSystem": "Web",
      "applicationCategory": "DeveloperApplication",
      "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "INR"
      }
    }
    </script>
    <script>
    function copyError(button) {
        const errorText = document.getElementById("errorMessage").innerText;

        navigator.clipboard.writeText(errorText).then(() => {
            button.innerHTML = '<i class="bi bi-check-circle me-1"></i>Copied!';
            
            setTimeout(() => {
                button.innerHTML = '<i class="bi bi-clipboard me-1"></i>Copy Error';
            }, 2000);
        });
    }
</script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/theme/dracula.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/addon/hint/show-hint.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/sql/sql.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/addon/hint/show-hint.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/addon/hint/sql-hint.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&family=Roboto+Mono:wght@400;500&display=swap');

        :root {
            --tokyo-bg: #1a1b26;
            --tokyo-card: #24283b;
            --tokyo-border: #414868;
            --tokyo-accent: #7aa2f7;
            --tokyo-success: #9ece6a;
            --tokyo-error: #f7768e;
            --tokyo-warn: #e0af68;
            --tokyo-comment: #565f89;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--tokyo-bg);
            color: #a9b1d6;
            overflow-x: hidden;
            line-height: 1.6;
            transition: background-color 0.3s, color 0.3s;
        }

        .navbar {
            background-color: #1f2335;
            border-bottom: 1px solid var(--tokyo-border);
            padding: 0.75rem 1.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
            transition: background-color 0.3s, border-color 0.3s;
        }

        .navbar-brand { font-weight: 700; color: var(--tokyo-accent) !important; letter-spacing: -0.5px; }

        /* --- CodeMirror Customization --- */
        .CodeMirror {
            border: 1px solid var(--tokyo-border);
            border-radius: 0.75rem;
            height: 420px;
            font-family: 'Roboto Mono', monospace;
            font-size: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
            transition: border-color 0.3s, box-shadow 0.3s, background-color 0.3s;
        }
        .CodeMirror-focused { 
            border-color: var(--tokyo-accent); 
            box-shadow: 0 0 0 3px rgba(122, 162, 247, 0.2);
        }
        .cm-s-dracula.CodeMirror { background-color: #16161e; }

        /* Autocomplete UI Styling */
        .CodeMirror-hints {
            background: var(--tokyo-card) !important;
            border: 1px solid var(--tokyo-border) !important;
            border-radius: 6px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.5);
            padding: 5px 0;
            z-index: 9999;
        }
        .CodeMirror-hint { color: #a9b1d6 !important; padding: 8px 15px !important; font-size: 14px; border-bottom: 1px solid rgba(255,255,255,0.05); }
        .CodeMirror-hint-active { background-color: var(--tokyo-accent) !important; color: #fff !important; }

        /* Layout Component UI */
        .card {
            background-color: var(--tokyo-card);
            border: 1px solid var(--tokyo-border);
            border-radius: 1rem;
            margin-bottom: 1.5rem;
            transition: transform 0.2s, background-color 0.3s, border-color 0.3s;
        }

        .accordion-item {
            background-color: var(--tokyo-card);
            border: 1px solid var(--tokyo-border);
            transition: background-color 0.3s, border-color 0.3s;
        }

        .accordion-button {
            background-color: var(--tokyo-card);
            color: #a9b1d6;
            font-weight: 600;
            transition: background-color 0.3s, color 0.3s;
        }

        .accordion-button:not(.collapsed) {
            background-color: #292e42;
            color: var(--tokyo-accent);
        }

        .btn-primary {
            background: linear-gradient(90deg, #7aa2f7, #bb9af7);
            border: none;
            padding: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            border-radius: 0.5rem;
            box-shadow: 0 4px 15px rgba(122, 162, 247, 0.3);
        }
        .btn-primary:hover { filter: brightness(1.1); transform: translateY(-1px); box-shadow: 0 6px 20px rgba(122, 162, 247, 0.4); }

        /* Data Terminal UI */
        .table-container {
            max-height: 600px;
            overflow-y: auto;
            border-radius: 0.5rem;
            border: 1px solid var(--tokyo-border);
            background: #16161e;
            transition: background-color 0.3s, border-color 0.3s;
            position: relative; /* Add this line */
        }
        
        .table-container .dropdown-menu {
            position: fixed !important;
            margin: 0 !important;
            z-index: 1060 !important;
        }

        .table { --bs-table-bg: transparent; color: #c0caf5; margin-bottom: 0; }
        .table thead th { background-color: #1f2335; color: var(--tokyo-accent); font-weight: 600; position: sticky; top: 0; z-index: 10; border-bottom: 1px solid var(--tokyo-border); }

        .analytics-card {
            background: rgba(122, 162, 247, 0.05);
            border: 1px solid var(--tokyo-border);
            border-left: 4px solid var(--tokyo-accent);
            padding: 12px 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .performance-badge {
            font-size: 0.7rem;
            padding: 4px 10px;
            border-radius: 20px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .sql-history-code {
            color: var(--tokyo-accent);
            font-family: 'Roboto Mono', monospace;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 280px;
            display: inline-block;
            background: #16161e;
            padding: 4px 8px;
            border-radius: 4px;
            border: 1px solid rgba(122, 162, 247, 0.1);
            vertical-align: middle;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .sql-expanded-container {
            background: #111219;
            border: 1px solid var(--tokyo-border);
            color: #9ece6a;
            font-family: 'Roboto Mono', monospace;
            white-space: pre-wrap;
            word-break: break-all;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .status-pill { width: 10px; height: 10px; border-radius: 50%; display: inline-block; margin-right: 8px; }
        .status-success { background-color: var(--tokyo-success); box-shadow: 0 0 10px var(--tokyo-success); }
        .status-failed { background-color: var(--tokyo-error); box-shadow: 0 0 10px var(--tokyo-error); }

        .schema-btn { padding: 4px 8px; font-size: 0.8rem; border: 1px solid transparent; border-radius: 4px; color: var(--tokyo-comment); }
        .schema-btn:hover { color: var(--tokyo-accent); border-color: var(--tokyo-border); background: rgba(122, 162, 247, 0.05); }

        .nav-tabs { border-bottom: 1px solid var(--tokyo-border); gap: 10px; }
        .nav-tabs .nav-link { 
            color: var(--tokyo-comment); 
            border: none; 
            border-radius: 0.5rem 0.5rem 0 0;
            font-weight: 600; 
            transition: color 0.2s, background 0.2s;
        }
        .nav-tabs .nav-link:hover { color: #a9b1d6; background: rgba(255,255,255,0.02); }
        .nav-tabs .nav-link.active { 
            background: rgba(122, 162, 247, 0.1); 
            color: var(--tokyo-accent); 
            border-bottom: 2px solid var(--tokyo-accent); 
        }

        /* --- Scrollbar Customization --- */
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: var(--tokyo-bg); }
        ::-webkit-scrollbar-thumb { background: var(--tokyo-border); border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--tokyo-comment); }

        /* --- Premium Theme Switcher & Light Mode Support (Tokyo Day Theme style) --- */
        #theme-toggle {
            transition: all 0.2s ease-in-out;
        }
        #theme-toggle:hover {
            transform: scale(1.1);
        }

        [data-bs-theme="light"] {
            --tokyo-bg: #f2f4f8;
            --tokyo-card: #ffffff;
            --tokyo-border: #cbd5e1;
            --tokyo-accent: #3b82f6;
            --tokyo-success: #10b981;
            --tokyo-error: #ef4444;
            --tokyo-warn: #f59e0b;
            --tokyo-comment: #64748b;
        }

        [data-bs-theme="light"] body {
            background-color: var(--tokyo-bg);
            color: #334155;
        }

        [data-bs-theme="light"] .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid var(--tokyo-border);
            color: #1e293b;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        [data-bs-theme="light"] .navbar-brand {
            color: var(--tokyo-accent) !important;
        }

        [data-bs-theme="light"] .navbar-brand small {
            color: #64748b !important;
        }

        [data-bs-theme="light"] .accordion-button {
            color: #475569;
        }

        [data-bs-theme="light"] .accordion-button:not(.collapsed) {
            background-color: #f1f5f9;
            color: var(--tokyo-accent);
        }

        [data-bs-theme="light"] .table-container {
            background: #ffffff;
            border-color: var(--tokyo-border);
        }

        [data-bs-theme="light"] .table {
            color: #334155;
        }

        [data-bs-theme="light"] .table thead th {
            background-color: #f8fafc;
            color: var(--tokyo-accent);
            border-bottom: 1px solid var(--tokyo-border);
        }

        [data-bs-theme="light"] .analytics-card {
            background: rgba(59, 130, 246, 0.04);
            border-color: var(--tokyo-border);
        }

        [data-bs-theme="light"] .sql-history-code {
            background: #f8fafc;
            border-color: #e2e8f0;
            color: var(--tokyo-accent);
        }

        [data-bs-theme="light"] .sql-expanded-container {
            background: #f8fafc;
            border-color: var(--tokyo-border);
            color: #0f172a;
        }

        [data-bs-theme="light"] .nav-tabs .nav-link {
            color: #64748b;
        }

        [data-bs-theme="light"] .nav-tabs .nav-link:hover {
            color: #334155;
            background: rgba(0,0,0,0.02);
        }

        [data-bs-theme="light"] .nav-tabs .nav-link.active {
            background: rgba(59, 130, 246, 0.08);
            color: var(--tokyo-accent);
            border-bottom-color: var(--tokyo-accent);
        }

        [data-bs-theme="light"] .CodeMirror {
            background-color: #ffffff !important;
            color: #334155 !important;
            border-color: var(--tokyo-border) !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        [data-bs-theme="light"] .CodeMirror-gutters {
            background-color: #f8fafc !important;
            border-right: 1px solid #cbd5e1 !important;
        }

        [data-bs-theme="light"] .CodeMirror-linenumber {
            color: #94a3b8 !important;
        }

        [data-bs-theme="light"] .CodeMirror-cursor {
            border-left: 2px solid #3b82f6 !important;
        }

        /* Syntax Overrides for CodeMirror Light Theme */
        [data-bs-theme="light"] .cm-keyword { color: #2563eb !important; font-weight: bold; }
        [data-bs-theme="light"] .cm-string { color: #0d9488 !important; }
        [data-bs-theme="light"] .cm-number { color: #ea580c !important; }
        [data-bs-theme="light"] .cm-comment { color: #64748b !important; font-style: italic; }
        [data-bs-theme="light"] .cm-variable { color: #0f172a !important; }
        [data-bs-theme="light"] .cm-variable-2 { color: #0891b2 !important; }
        [data-bs-theme="light"] .cm-property { color: #7c3aed !important; }
        [data-bs-theme="light"] .cm-atom { color: #d97706 !important; }

        /* Modal & Form elements adaptive support */
        [data-bs-theme="light"] .modal-content {
            background-color: #ffffff !important;
            border-color: #cbd5e1 !important;
        }
        [data-bs-theme="light"] .modal-header, 
        [data-bs-theme="light"] .modal-footer {
            border-color: #e2e8f0 !important;
        }
        [data-bs-theme="light"] .bg-dark.bg-opacity-25 {
            background-color: rgba(0, 0, 0, 0.03) !important;
        }
        [data-bs-theme="light"] .bg-dark {
            background-color: #f8fafc !important;
        }
        [data-bs-theme="light"] .bg-black {
            background-color: #f1f5f9 !important;
        }
        [data-bs-theme="light"] .bg-dark.bg-opacity-50 {
            background-color: rgba(0, 0, 0, 0.05) !important;
        }
        [data-bs-theme="light"] .text-white-50 {
            color: #64748b !important;
        }
        [data-bs-theme="light"] .text-white {
            color: #1e293b !important;
        }
        [data-bs-theme="light"] .alert-secondary {
            background-color: #f1f5f9;
            border-color: #e2e8f0;
            color: #475569;
        }
        [data-bs-theme="light"] #query-history .list-group-item {
            color: #475569;
        }
        [data-bs-theme="light"] #query-history .list-group-item:hover {
            background-color: #f1f5f9;
        }
        
        
.status-dot{
    font-size: 8px;
    color: #22c55e;
    animation: breathingGreen 3.5s ease-in-out infinite;
}

@keyframes breathingGreen {
    0% {
        opacity: 0.25;
        filter: drop-shadow(0 0 1px #22c55e);
        transform: scale(1);
    }

    50% {
        opacity: 1;
        filter: drop-shadow(0 0 8px #22c55e);
        transform: scale(1.08);
    }

    100% {
        opacity: 0.25;
        filter: drop-shadow(0 0 1px #22c55e);
        transform: scale(1);
    }
}


            
/* Optimized Hardware Acceleration & Smooth Layout Wrappers for Error Traces */
[id^="globalErrorCollapse_"] .alert {
    will-change: transform, opacity;
    transform: translateZ(0); /* Forces GPU layer rendering to stop page lag */
    backface-visibility: hidden;
}

[id^="globalErrorCollapse_"] pre, 
[id^="globalErrorCollapse_"] div {
    max-height: 250px;
    overflow-y: auto;
    overflow-x: hidden;
    word-break: break-word;
    white-space: pre-wrap;
    font-size: 11.5px !important;
}

/* Scrollbar tuning for the tiny error block to avoid full table repaints */
[id^="globalErrorCollapse_"] div::-webkit-scrollbar {
    width: 4px;
}
[id^="globalErrorCollapse_"] div::-webkit-scrollbar-thumb {
    background: rgba(247, 118, 142, 0.3);
    border-radius: 4px;
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
                    <small class="fw-light text-white-50" style="font-size: 10px; letter-spacing: 1px;">SKILLS BUILDER HUB</small>
                </div>
            </a>
                <div class="ms-auto d-flex align-items-center gap-2 gap-md-3 flex-wrap">
                     <button type="button" class="btn btn-sm btn-outline-info d-flex align-items-center gap-1 px-2.5 py-1.5 rounded-3" 
                             onclick="openDatabaseRegistrationGate()" 
                             title="Link External MySQL Workspace">
                         <i class="bi bi-database-add"></i>
                         <span class="d-none d-sm-inline font-monospace" style="font-size: 11px; letter-spacing: 0.5px;">+ LINK CUSTOM DB</span>
                     </button>
                
                     <button id="theme-toggle" class="btn btn-sm btn-outline-secondary border-0 rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;" title="Switch Themes">
                         <i id="theme-icon" class="bi bi-sun-fill text-warning fs-5"></i>
                     </button>
                
                     <div id="student-identity-badge" class="badge bg-dark border border-secondary px-3 py-2 font-monospace d-none">
                        <i class="bi bi-person-circle text-info me-2"></i><span id="active-student-username">Student</span>
                     </div>
                    <div id="connection-indicator"
                         class="small text-success d-none d-md-flex align-items-center fw-medium">
                        <i class="bi bi-circle-fill me-2 status-dot"></i>
                        DB CONNECTED
                    </div>
                     <div class="vr bg-secondary d-none d-md-block" style="height: 25px; opacity: 0.3;"></div>
                     <select id="db-mode-select" class="form-select form-select-sm bg-dark text-white border-secondary" style="width: auto; cursor: pointer;">
                         <option value="ro" selected>Read-Only (Main DB)</option>
                         <option value="rw">Read-Write (Sandbox)</option>
                     </select>
                </div>
        </div>
    </nav>

    <div class="container-fluid p-4">
        <div class="row g-4">
            <div class="col-lg-3">
                <div class="accordion shadow-sm border-0" id="leftPanelAccordion">
                    
                     <div class="accordion-item border-0 rounded-4 overflow-hidden mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button text-white" type="button" data-bs-toggle="collapse" data-bs-target="#schema-collapse" style="color: inherit !important;">
                                <i class="bi bi-diagram-3 me-2 text-info"></i> Object Explorer - Tables
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
                    
                    <div class="accordion-item border-0 rounded-4 overflow-hidden mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#quiz-collapse">
                                <i class="bi bi-patch-check me-2 text-warning"></i> Skill Assessment
                            </button>
                        </h2>
                        <div id="quiz-collapse" class="accordion-collapse collapse" data-bs-parent="#leftPanelAccordion">
                            <div class="accordion-body" id="quiz-panel">
                                </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 rounded-4 overflow-hidden">
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
                                    <button id="clear-history-btn" class="btn btn-link btn-sm text-danger text-decoration-none fw-bold">DELETE SESSION DATA</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-9">
                <div class="card p-4 border-0 shadow-lg mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="m-0 text-info fw-bold font-monospace uppercase tracking-wider">
                            <i class="bi bi-terminal-fill me-2"></i>Query Terminal
                        </h6>
                        <div class="d-flex align-items-center gap-3">
                            <div id="editor-quality-badge-container" class="d-none">
                                <span class="small text-white-50 me-1">Live Quality Score:</span>
                                <span id="editor-quality-pill" class="badge bg-success font-monospace" style="font-size: 13px;">100/100</span>
                            </div>
                            <div id="performance-hint" class="small transition-all"></div>
                        </div>
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
                                    <i class="bi bi-magic me-1"></i> AI Assistant (Beta)
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-danger border-danger border-opacity-25" onclick="editor.setValue('');">
                                    <i class="bi bi-eraser-fill"></i>
                                </button>
                            </div>
                        </div>

                        <button id="run-query-btn" type="submit" class="btn btn-primary btn-lg w-100 mt-3 d-flex align-items-center justify-content-center shadow">
                            <span id="btn-text"><i class="bi bi-play-circle-fill me-2"></i>RUN</span>
                            <div id="btn-loader" class="spinner-border spinner-border-sm d-none" role="status"></div>
                        </button>
                    </form>
                </div>

                <div class="card p-4 border-0 shadow-lg">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="m-0 text-info fw-bold text-uppercase"><i class="bi bi-window-sidebar me-2"></i>Management Console</h6>
                        <button id="download-csv-btn" class="btn btn-sm btn-outline-success d-none border-success border-opacity-25">
                            <i class="bi bi-cloud-download me-1"></i> EXPORT RESULT
                        </button>
                    </div>

                    <div id="execution-analytics" class="d-none analytics-card">
                        <div class="row align-items-center text-center">
                            <div class="col-md-3 border-end border-secondary">
                                <div class="text-white-50 x-small fw-bold">THROUGHPUT</div>
                                <div><b id="stat-speed">0</b> <span class="small">rows/s</span></div>
                            </div>
                            <div class="col-md-3 border-end border-secondary">
                                <div class="text-white-50 x-small fw-bold">LATENCY</div>
                                <div><b id="stat-latency">0</b> <span class="small">ms</span></div>
                            </div>
                            <div class="col-md-3 border-end border-secondary">
                                <div class="text-white-50 x-small fw-bold">IO VOLUME</div>
                                <div><b id="stat-count">0</b> <span class="small">records</span></div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-white-50 x-small mb-1 fw-bold">ENGINE RANKING</div>
                                <span class="performance-badge" id="performance-rank">Analyzing</span>
                            </div>
                        </div>
                    </div>

                    <ul class="nav nav-tabs mb-3" id="outputTabs" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" id="results-tab" data-bs-toggle="tab" data-bs-target="#results-panel" type="button">Results</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="quality-tab" data-bs-toggle="tab" data-bs-target="#quality-panel" type="button">Quality Report <span id="quality-tab-badge" class="badge bg-success ms-1">100/100</span></button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="plan-tab" data-bs-toggle="tab" data-bs-target="#plan-panel" type="button" onclick="fetchExecutionPlan()">PLANNER (EXPLAIN)</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="viz-tab" data-bs-toggle="tab" data-bs-target="#viz-panel" type="button" disabled>ANALYTICS</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="shared-history-tab" data-bs-toggle="tab" data-bs-target="#shared-history-panel" type="button" onclick="fetchSharedHistory()">Query History(Global)</button>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="results-panel">
                            <!-- Premium real-time warning threshold box -->
                            <div id="quality-warning-banner" class="alert alert-warning d-none py-2 px-3 mb-3 rounded-3 small border-0 shadow-sm">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="bi bi-exclamation-triangle-fill text-warning me-2"></i>
                                        <span>Performance bottlenecks detected! Query score is <b id="warning-banner-score">100</b>/100.</span>
                                    </div>
                                    <button class="btn btn-sm btn-outline-warning py-0 px-2 fw-bold" style="font-size: 11px;" onclick="bootstrap.Tab.getOrCreateInstance(document.getElementById('quality-tab')).show();">
                                        VIEW REPORT
                                    </button>
                                </div>
                            </div>

                            <div id="msg-area" class="alert alert-secondary small italic text-center py-4 bg-dark bg-opacity-25 border-secondary border-opacity-25">
                                <i class="bi bi-info-circle me-2 text-info"></i> Commit a statement above to populate the data grid.
                            </div>
                            <div id="results-table-container" class="table-container d-none border-secondary border-opacity-25 shadow-sm">
                                <table class="table table-hover table-sm">
                                    <thead id="results-header"></thead>
                                    <tbody id="results-body"></tbody>
                                </table>
                            </div>
                        </div>

                        <!-- NEW TAB PANEL: Dynamic SQL Optimization & Quality Score Dashboard -->
                        <div class="tab-pane fade" id="quality-panel">
                            <div class="analytics-card mb-3 p-3 rounded-4 bg-dark bg-opacity-50">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="bi bi-shield-check text-info me-2 fs-5"></i> 
                                        <span class="fw-bold text-info">MySQL Code Optimization Engine</span>
                                    </div>
                                    <span class="small text-white-50 italic">Calculated Client-side</span>
                                </div>
                            </div>
                            
                            <div class="card border-0 p-4 shadow-sm mb-0" style="background-color: rgba(0,0,0,0.15);">
                                <div class="row g-4" id="quality-report-row">
                                    <div class="col-md-4 text-center border-end border-secondary border-opacity-25 py-3">
                                        <div class="position-relative d-inline-flex justify-content-center align-items-center mb-2" style="width: 140px; height: 140px;">
                                            <!-- SVG outer score circle gauge -->
                                            <svg class="position-absolute w-100 h-100" style="transform: rotate(-90deg);">
                                                <circle cx="70" cy="70" r="60" fill="transparent" stroke="rgba(255,255,255,0.05)" stroke-width="8"></circle>
                                                <circle id="quality-score-circle" cx="70" cy="70" r="60" fill="transparent" stroke="var(--tokyo-success)" stroke-width="8" stroke-dasharray="377" stroke-dashoffset="0" style="transition: stroke-dashoffset 0.8s ease-in-out;"></circle>
                                            </svg>
                                            <div class="text-center z-1">
                                                <h1 id="quality-score-num" class="m-0 font-monospace fw-bold text-white" style="font-size: 2.5rem;">100</h1>
                                                <small class="text-white-50 text-uppercase tracking-wider" style="font-size: 10px;">SCORE</small>
                                            </div>
                                        </div>
                                        <h5 id="quality-grade" class="font-monospace fw-bold text-success mt-2">GRADE A+</h5>
                                        <p id="quality-verdict" class="small text-white-50 px-3">Excellent! Your query follows modern database optimization best practices.</p>
                                    </div>
                                    <div class="col-md-8">
                                        <div id="quality-rules-list" class="d-flex flex-column gap-2" style="max-height: 420px; overflow-y: auto; padding-right: 5px;">
                                            <!-- Evaluated rules filled by JS -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="plan-panel">
                            <div class="analytics-card mb-3 small bg-dark bg-opacity-50">
                                <i class="bi bi-info-circle text-info me-2"></i> The Query Execution Plan reveals indices utilized, scan counts, and estimated overhead costs for the current instruction set.
                            </div>
                            <div class="table-container">
                                <table class="table table-sm table-hover">
                                    <thead id="plan-header" class="table-secondary"></thead>
                                    <tbody id="plan-body"></tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="viz-panel">
                             <div id="viz-controls" class="p-4 rounded-4 shadow-sm mb-4 border border-secondary border-opacity-10" style="background-color: #16161e;">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label class="form-label text-white-50 font-monospace" style="font-size: 11px; fw-bold;">1. VISUAL TYPE</label>
                                        <select id="chart-type-select" class="form-select form-select-sm bg-dark text-white border-secondary"></select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label text-white-50 font-monospace" style="font-size: 11px; fw-bold;">2. AXIS DIMENSION (X-AXIS)</label>
                                        <select id="label-col-select" class="form-select form-select-sm bg-dark text-white border-secondary"></select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label text-white-50 font-monospace" style="font-size: 11px; fw-bold;">3. AGGREGATION RULE</label>
                                        <select id="chart-agg-select" class="form-select form-select-sm bg-dark text-white border-secondary">
                                            <option value="NONE" selected>None (Plot Raw Records)</option>
                                            <option value="SUM">SUM (Total values)</option>
                                            <option value="AVG">AVERAGE (Mean calculation)</option>
                                            <option value="COUNT">COUNT (Row occurances)</option>
                                            <option value="MIN">MINIMUM (Floor baseline)</option>
                                            <option value="MAX">MAXIMUM (Ceiling peak)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label text-white-50 font-monospace" style="font-size: 11px; fw-bold;">4. MEASURE METRICS (Y-AXIS)</label>
                                        <select id="data-col-select" class="form-select form-select-sm bg-dark text-white border-secondary" multiple style="min-height: 38px; max-height: 120px;"></select>
                                        <small class="text-white-50 d-block mt-1" style="font-size: 10px;">Hold Ctrl / Cmd to select multiple measures</small>
                                    </div>
                                </div>
                        
                                <hr class="border-secondary opacity-15 my-3">
                        
                                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                                    <div class="d-flex align-items-center gap-4">
                                        <div class="form-check form-switch p-0 m-0 d-flex align-items-center gap-2">
                                            <input class="form-check-input ms-0 m-0" type="checkbox" id="chart-toggle-grid" checked style="cursor: pointer;">
                                            <label class="form-check-label text-white-50 font-monospace" for="chart-toggle-grid" style="font-size: 11px; cursor: pointer;">Show Gridlines</label>
                                        </div>
                                        <div class="form-check form-switch p-0 m-0 d-flex align-items-center gap-2">
                                            <input class="form-check-input ms-0 m-0" type="checkbox" id="chart-toggle-stacked" style="cursor: pointer;">
                                            <label class="form-check-label text-white-50 font-monospace" for="chart-toggle-stacked" style="font-size: 11px; cursor: pointer;">Stacked Layout</label>
                                        </div>
                                    </div>
                                    <button id="update-chart-btn" class="btn btn-info btn-sm fw-bold px-4 tracking-wider text-white">
                                        <i class="bi bi-lightning-charge-fill me-1"></i> RENDER DASHBOARD VISUAL
                                    </button>
                                </div>
                            </div>
                        
                            <div id="bi-kpi-strip" class="row g-3 mb-4 d-none">
                                </div>
                        
                            <div class="chart-container rounded-4 bg-dark bg-opacity-25 p-4 border border-secondary border-opacity-10 position-relative" style="min-height: 480px; height: 550px;">
                                <canvas id="results-chart"></canvas>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="shared-history-panel">
                            <div class="mb-3 px-1">
                                <div class="input-group input-group-sm border-secondary shadow-inner" style="max-width: 400px;">
                                    <span class="input-group-text bg-dark border-secondary text-info"><i class="bi bi-search"></i></span>
                                    <input type="text" id="history-name-search" class="form-control bg-dark text-light border-secondary" placeholder="Filter log outputs by Student Name..." oninput="fetchSharedHistory()">
                                </div>
                            </div>
                            <div class="table-container border-0">
                                <table class="table table-sm table-hover align-middle">
                                    <thead>
                                        <tr class="text-white-50 x-small text-uppercase">
                                            <th>State</th>
                                            <th>Student</th>
                                            <th>Started At (IST)</th>
                                            <th>Latency</th>
                                            <th>Records</th>
                                            <th>Error Details</th> <th>Logic Snippet</th>
                                            <th>Notes</th>
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

<div class="modal fade" id="studentRegistrationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content border-info border-opacity-25 shadow-2xl" style="background-color: var(--tokyo-card);">
            <div class="modal-header border-0 pb-1">
                <h6 class="modal-title text-info fw-bold"><i class="bi bi-shield-lock-fill text-warning me-2"></i>LAB GATEWAY & DATABASE MANAGER</h6>
                </div>
            <div class="modal-body py-3">
                 <p class="text-white-50 small mb-3">
                    <p class="text-white-50 small mb-3">
                        Welcome to <strong>SQL Lab</strong> by <strong>SKILLS BUILDER HUB</strong>. Sign in to access your registered database environment.
                    </p>
                    
                    <p class="text-warning small mb-0">
                        <strong>Note:</strong> Only <strong>Skills Builder Hub</strong> server databases are supported. To create a new database or request access, contact us on WhatsApp.
                        <br>
                        <a href="https://wa.me/919677394953" target="_blank" class="text-success text-decoration-none fw-semibold">
                            <i class="bi bi-whatsapp me-1"></i> +91 96773 94953
                        </a>
                    </p>
                
                <div class="mb-3">
                    <label class="form-label text-white-50 small font-monospace">1. Student Name <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-black border-secondary text-info"><i class="bi bi-person-badge-fill"></i></span>
                        <input type="text" id="onboarding-input-name" class="form-control bg-black text-info border-secondary font-monospace" placeholder="Type your name..." required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white-50 small font-monospace">2. Target Database Workspace</label>
                    <select id="onboarding-db-selector" class="form-select bg-black text-light border-secondary font-monospace">
                        <option value="ro">System Read-Only Database</option>
                        <option value="rw">System Read-Write Database</option>
                        <option value="custom_new">+ Register External Database...</option>
                    </select>
                </div>

                <div id="custom-db-fields" class="d-none border border-secondary border-opacity-25 rounded-3 p-3 mb-3 bg-black bg-opacity-25 shadow-inner">
                    <div class="mb-2">
                        <label class="text-white-50 font-monospace" style="font-size: 11px;">Hostname / IP Target</label>
                        <input type="text" id="custom-db-host" class="form-control form-control-sm bg-black text-light border-secondary font-monospace" value="srv1402.hstgr.io">
                    </div>
                    <div class="mb-2">
                        <label class="text-white-50 font-monospace" style="font-size: 11px;">Database Target Name</label>
                        <input type="text" id="custom-db-name" class="form-control form-control-sm bg-black text-light border-secondary font-monospace" placeholder="database name">
                    </div>
                    <div class="mb-0">
                        <label class="text-white-50 font-monospace" style="font-size: 11px;">Database User Account</label>
                        <input type="text" id="custom-db-user" class="form-control form-control-sm bg-black text-light border-secondary font-monospace" placeholder="user name">
                    </div>
                </div>

                <div id="gateway-password-block" class="mb-2 d-none">
                    <label id="pass-gateway-label" class="form-label text-white-50 small font-monospace">3. Security Access Password <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-black border-secondary text-warning"><i class="bi bi-key-fill"></i></span>
                        <input type="password" id="onboarding-input-pass" class="form-control bg-black text-warning border-secondary font-monospace" placeholder="Enter workspace password...">
                    </div>
                </div>

                <div id="onboarding-error-area" class="text-danger small mt-2 d-none font-monospace"><i class="bi bi-exclamation-circle me-1"></i> Form verification failed. Please populate all required targets.</div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" id="submit-onboarding-btn" class="btn btn-info btn-sm w-100 fw-bold text-white shadow-lg">INITIALIZE LAB SPACE</button>
            </div>
        </div>
    </div>
</div>



    <div class="modal fade" id="aiAssistModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-info border-opacity-25 shadow-2xl" style="background-color: var(--tokyo-card);">
                <div class="modal-header border-secondary border-opacity-25">
                    <h6 class="modal-title text-info fw-bold"><i class="bi bi-magic me-2"></i>SQL ARCHITECT ENGINE</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="text-white-50 small mb-3">Define your business requirement in natural language. The engine will synthesize a valid and optimized MySQL statement.</p>
                    <textarea id="ai-prompt" class="form-control bg-black text-info border-secondary font-monospace" rows="5" placeholder="e.g. Calculate the year-over-year growth percentage for total sales per category, filtered by 'Active' region..."></textarea>
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
         * Integrates IntelliSense, Telemetry, and Data Engineering Utilities
         */

        const API_ENDPOINT = 'api.php';
        let currentResults = { headers: [], data: [] };
        let queryHistory = JSON.parse(localStorage.getItem('sqlLabHistory')) || [];
        let resultsChart = null;
        let dbMode = 'ro'; 
        let dbTables = {}; // Dynamic Metadata Repository
        let activeStudentName = 'Anonymous'; // Default state identity wrapper

        /**
         * Enhanced Theme Manager: Light & Dark Mode
         */
        function initTheme() {
            const savedTheme = localStorage.getItem('sqlLabTheme') || 'dark';
            applyTheme(savedTheme);
        }

        function applyTheme(theme) {
            const html = document.documentElement;
            const themeIcon = document.getElementById('theme-icon');
            const identityBadge = document.getElementById('student-identity-badge');
            const connectionBadge = document.getElementById('connection-indicator');
            const selectBadge = document.getElementById('db-mode-select');

            html.setAttribute('data-bs-theme', theme);
            localStorage.setItem('sqlLabTheme', theme);

            if (theme === 'dark') {
                themeIcon.className = 'bi bi-sun-fill text-warning fs-5';
                if (identityBadge) {
                    identityBadge.className = 'badge bg-dark border border-secondary px-3 py-2 font-monospace d-none';
                }
                if (selectBadge) {
                    selectBadge.className = 'form-select form-select-sm bg-dark text-white border-secondary';
                }
            } else {
                themeIcon.className = 'bi bi-moon-stars-fill text-primary fs-5';
                if (identityBadge) {
                    identityBadge.className = 'badge bg-light text-dark border border-secondary px-3 py-2 font-monospace d-none';
                }
                if (selectBadge) {
                    selectBadge.className = 'form-select form-select-sm bg-white text-dark border-secondary';
                }
            }
        }

        document.getElementById('theme-toggle').onclick = () => {
            const currentTheme = document.documentElement.getAttribute('data-bs-theme') || 'dark';
            const nextTheme = currentTheme === 'dark' ? 'light' : 'dark';
            applyTheme(nextTheme);
        };

        // Initialize Theme preference
        initTheme();

        /**
         * SQL Quality Diagnostics Scoring Core Engine
         * Evaluates structure for best practices and calculates 0-100 Score.
         */
        function analyzeSQLQuality(query) {
            const q = query.toLowerCase().trim();
            
            if (!q) {
                return {
                    score: 100,
                    grade: "N/A",
                    verdict: "Enter a query statement above to run live diagnostics checks.",
                    rules: []
                };
            }

            // Detect and handle helper statements
            const isUtility = /^\s*(show|describe|desc|explain|use|set|create|drop|alter|truncate)\b/i.test(q);
            if (isUtility) {
                return {
                    score: 100,
                    grade: "A+",
                    verdict: "System control statement / Schema management statement. No sorting optimizations required.",
                    rules: [
                        {
                            name: "Utility Command Pattern",
                            status: "passed",
                            message: "This query manages definitions or session settings, which does not scan target data scopes.",
                            deduction: 0,
                            tip: "Check sandbox restrictions before running modifications on live DB systems."
                        }
                    ]
                };
            }

            const isSelect = /^\s*select\b/i.test(q);
            const isUpdate = /^\s*update\b/i.test(q);
            const isDelete = /^\s*delete\b/i.test(q);
            
            let score = 100;
            const rules = [];

            // Rule 1: Scoped writes checks (Deductions: 40 pts)
            if (isUpdate || isDelete) {
                if (!/\bwhere\b/i.test(q)) {
                    score -= 40;
                    rules.push({
                        name: "Unscoped Data Modification Risk",
                        status: "failed",
                        message: "CRITICAL: No WHERE clause detected in database modify or delete statement! This is unsafe and alters every record on the table.",
                        deduction: 40,
                        tip: "Always target records with clear predicates. Consider adding LIMIT checks as secondary fallback safety wrappers."
                    });
                } else {
                    rules.push({
                        name: "Scoped Write/Delete Safety",
                        status: "passed",
                        message: "WHERE clause parameters found targeting table rows.",
                        deduction: 0,
                        tip: "Validate target parameters and do tests in sandboxes to verify constraints."
                    });
                }
            } else if (isSelect) {
                if (!/\bwhere\b/i.test(q)) {
                    if (/\blimit\b/i.test(q)) {
                        rules.push({
                            name: "Scanned Range Safety Checks",
                            status: "passed",
                            message: "Query lacks filters, but contains LIMIT bounds limiting return overhead.",
                            deduction: 0,
                            tip: "For high concurrency features, append filters to utilize primary scanning indices."
                        });
                    } else {
                        score -= 15;
                        rules.push({
                            name: "Unconstrained Range Scans",
                            status: "warning",
                            message: "SELECT statement has no filtering parameters (WHERE clause). This triggers a table sweep to load all records.",
                            deduction: 15,
                            tip: "Target columns using WHERE boundaries. This lowers query scan lookups on high-row databases."
                        });
                    }
                } else {
                    rules.push({
                        name: "Filtering Criteria Optimization",
                        status: "passed",
                        message: "Filters applied to restrict output results.",
                        deduction: 0,
                        tip: "Verify that columns inside WHERE clauses match indexed constraints to speed up row retrieval."
                    });
                }
            }

            // Rule 2: Result set bounds constraint checks (Deductions: 15 pts)
            if (isSelect) {
                if (!/\blimit\b/i.test(q)) {
                    score -= 15;
                    rules.push({
                        name: "Result Payload Constraints",
                        status: "warning",
                        message: "No LIMIT was configured on the query. This is unsafe if tables contain deep records and will waste network IO.",
                        deduction: 15,
                        tip: "Append a LIMIT clause (e.g. LIMIT 50) to restrict query output scale to viewable rows."
                    });
                } else {
                    rules.push({
                        name: "Result Payload Constraints",
                        status: "passed",
                        message: "LIMIT block mapped to avoid payload spikes.",
                        deduction: 0,
                        tip: "Pair LIMIT boundaries with OFFSET to allow navigation bounds inside interfaces."
                    });
                }
            }

            // Rule 3: Selective column projection optimization checks (Deductions: 15 pts)
            if (isSelect) {
                const isWildcard = /\*\s*/i.test(q) || /\bselect\s+(\w+\s*,\s*)*\*\b/i.test(q) || /select\s+(\w+\.)?\*/i.test(q);
                if (isWildcard) {
                    score -= 15;
                    rules.push({
                        name: "Column Projection (SELECT *) Checklist",
                        status: "warning",
                        message: "Wildcard selector (SELECT *) pulls all columns. This wastes engine buffers, increases network payload, and turns off index-only lookups.",
                        deduction: 15,
                        tip: "Explicitly reference only the needed table attributes, e.g. SELECT id, first_name instead of general SELECT *."
                    });
                } else {
                    rules.push({
                        name: "Column Projection Optimization",
                        status: "passed",
                        message: "Selective columns mapped to request payload variables.",
                        deduction: 0,
                        tip: "Using clean explicit attributes protects data structures from dynamic changes when tables grow."
                    });
                }
            }

            // Rule 4: Sorted scanning optimizations checks (Deductions: 10 pts)
            if (/\border\s+by\b/i.test(q)) {
                if (/\blimit\b/i.test(q)) {
                    rules.push({
                        name: "Sorting Lookup Execution",
                        status: "passed",
                        message: "ORDER BY is structured alongside LIMIT bounds.",
                        deduction: 0,
                        tip: "Match columns inside ORDER BY parameters with matching indexes to completely avoid 'filesort' structures."
                    });
                } else {
                    score -= 10;
                    rules.push({
                        name: "Sorting Lookup Execution",
                        status: "warning",
                        message: "Sorting data using ORDER BY without LIMIT forces memory sort sweeps across all selected records.",
                        deduction: 10,
                        tip: "Add LIMIT constraints to abort memory sorting processes as soon as the target count matches."
                    });
                }
            } else if (isSelect) {
                rules.push({
                    name: "Sorting Lookup Execution",
                    status: "passed",
                    message: "No sort routines applied, bypassing filesort engines.",
                    deduction: 0,
                    tip: "Perform client-side arrays sorts if database results are small to decrease database server CPU loads."
                });
            }

            // Rule 5: SARG Search arguments checks (Deductions: 10 pts)
            const isNonSargable = /(\bdate|\byear|\bmonth|\blower|\bupper|\bconcat|\bsubstring)\s*\(\s*[a-zA-Z0-9_.]+\s*\)\s*=/i.test(q);
            if (isNonSargable) {
                score -= 10;
                rules.push({
                    name: "Sargable Filter Conditions (SARG)",
                    status: "failed",
                    message: "Non-sargable parameter: Column was enclosed inside functional wraps (YEAR, MONTH, LOWER, CONCAT) inside filters. This turns off database indices, testing functions on every single row.",
                    deduction: 10,
                    tip: "Rewrite constraints to isolate raw column targets, e.g. instead of WHERE YEAR(created_at) = 2026, write WHERE created_at >= '2026-01-01' AND created_at <= '2026-12-31'."
                });
            } else if (isSelect || isUpdate || isDelete) {
                rules.push({
                    name: "Sargable Filter Conditions (SARG)",
                    status: "passed",
                    message: "Filter criteria use raw column attributes, ensuring sargable performance.",
                    deduction: 0,
                    tip: "Avoid using math operations or string concatenation on columns inside filtering logic."
                });
            }

            // Rule 6: Duplicate sorting overhead logic (Deductions: 10 pts)
            if (/\bselect\s+distinct\b/i.test(q)) {
                score -= 10;
                rules.push({
                    name: "De-duplication Memory Allocations",
                    status: "warning",
                    message: "DISTINCT forces database engines to group and sort records to drop matching duplicates.",
                    deduction: 10,
                    tip: "Remove DISTINCT if primary identifier columns can ensure natural uniqueness throughout query blocks."
                });
            } else if (isSelect) {
                rules.push({
                    name: "De-duplication Memory Allocations",
                    status: "passed",
                    message: "Avoided DISTINCT checks on row attributes.",
                    deduction: 0,
                    tip: "Use proper indexing keys to avoid duplicate records."
                });
            }

            // Rule 7: JOIN mappings safety validation (Deductions: 15 pts)
            if (/\bjoin\b/i.test(q)) {
                if (/\bon\b/i.test(q) || /\busing\b/i.test(q)) {
                    rules.push({
                        name: "Table Join Predicate mapping",
                        status: "passed",
                        message: "Clean relationship conditions (ON/USING) present for related tables.",
                        deduction: 0,
                        tip: "Use identical schemas (matching integer parameters) on Join targets to optimize internal mapping lookups."
                    });
                } else {
                    score -= 15;
                    rules.push({
                        name: "Table Join Predicate mapping",
                        status: "failed",
                        message: "Join statements lack ON parameters. This triggers structural cross scans, rendering Cartesian products.",
                        deduction: 15,
                        tip: "Rewrite parameters using explicit configurations, e.g. INNER JOIN orders ON users.id = orders.user_id."
                    });
                }
            }

            // Rule 8: Trailing vs Leading fuzzy lookups performance (Deductions: 10 pts)
            if (/\blike\s+['"]%/i.test(q)) {
                score -= 10;
                rules.push({
                    name: "Fuzzy Lookup Scan Optimizer",
                    status: "warning",
                    message: "Leading wildcards (e.g. LIKE '%pattern%') bypass standard indexes since index strings cannot look up reverse order sequences.",
                    deduction: 10,
                    tip: "If applicable, switch to trailing wildcards, e.g. LIKE 'pattern%' which uses indexing, or set up Full-Text index structures."
                });
            } else if (/\blike\b/i.test(q)) {
                rules.push({
                    name: "Fuzzy Lookup Scan Optimizer",
                    status: "passed",
                    message: "Exact or prefix trailing searches configured.",
                    deduction: 0,
                    tip: "Index-based algorithms are optimal for prefix queries."
                });
            }

            if (score < 0) score = 0;
            if (score > 100) score = 100;

            let grade = "F";
            let verdict = "";
            if (score >= 95) {
                grade = "A+";
                verdict = "Excellent! Your query matches high optimization standards and runs quickly.";
            } else if (score >= 90) {
                grade = "A";
                verdict = "Very good. Standard query formats are correctly configured with highly structured elements.";
            } else if (score >= 80) {
                grade = "B";
                verdict = "Standard. Run recommendations to protect backend execution buffers against latency.";
            } else if (score >= 70) {
                grade = "C";
                verdict = "Sub-optimal structures. Bottlenecks will trigger slow scans on dense tables.";
            } else if (score >= 50) {
                grade = "D";
                verdict = "Warning. Fix constraints to block unsafe structural behaviors.";
            } else {
                grade = "F";
                verdict = "Unsafe structural patterns! Run evaluations before execution tasks.";
            }

            return { score, grade, verdict, rules };
        }

        /**
         * Update and Render SQL Quality Diagnostics GUI widgets
         */
        function renderQualityReport(query) {
            const analysis = analyzeSQLQuality(query);
            
            // Render Live Header Badges
            const liveBadgeContainer = document.getElementById('editor-quality-badge-container');
            const livePill = document.getElementById('editor-quality-pill');
            
            if (query.trim()) {
                if (liveBadgeContainer && livePill) {
                    liveBadgeContainer.classList.remove('d-none');
                    livePill.innerText = `${analysis.score}/100`;
                    
                    if (analysis.score >= 90) {
                        livePill.className = "badge bg-success font-monospace";
                    } else if (analysis.score >= 75) {
                        livePill.className = "badge bg-info text-white font-monospace";
                    } else if (analysis.score >= 60) {
                        livePill.className = "badge bg-warning text-dark font-monospace";
                    } else {
                        livePill.className = "badge bg-danger font-monospace";
                    }
                }
            } else {
                if (liveBadgeContainer) liveBadgeContainer.classList.add('d-none');
            }

            // Tab badge indicators
            const tabBadge = document.getElementById('quality-tab-badge');
            if (tabBadge) {
                tabBadge.innerText = `${analysis.score}/100`;
                if (analysis.score >= 90) {
                    tabBadge.className = "badge bg-success ms-1";
                } else if (analysis.score >= 75) {
                    tabBadge.className = "badge bg-info text-white ms-1";
                } else if (analysis.score >= 60) {
                    tabBadge.className = "badge bg-warning text-dark ms-1";
                } else {
                    tabBadge.className = "badge bg-danger ms-1";
                }
            }

            // Dynamic Results warning banners
            const warningBanner = document.getElementById('quality-warning-banner');
            const bannerScore = document.getElementById('warning-banner-score');
            
            if (warningBanner) {
                // Ignore warning notifications for system configurations or basic schemas
                const isSystemCmd = /^\s*(show|describe|desc|explain)\b/i.test(query.toLowerCase());
                if (analysis.score < 80 && query.trim() && !isSystemCmd) {
                    warningBanner.classList.remove('d-none');
                    if (bannerScore) bannerScore.innerText = analysis.score;
                    
                    if (analysis.score < 60) {
                        warningBanner.className = "alert alert-danger py-2 px-3 mb-3 rounded-3 small border-0 shadow-sm";
                        warningBanner.innerHTML = `
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <i class="bi bi-shield-slash-fill text-danger me-2 fs-6"></i>
                                    <span><b>Critical Execution Bottleneck:</b> Query score is <b class="text-danger font-monospace">${analysis.score}</b>/100!</span>
                                </div>
                                <button class="btn btn-sm btn-outline-danger py-0 px-2 fw-bold" style="font-size: 11px;" onclick="bootstrap.Tab.getOrCreateInstance(document.getElementById('quality-tab')).show();">
                                    REPAIR STATEMENT
                                </button>
                            </div>
                        `;
                    } else {
                        warningBanner.className = "alert alert-warning py-2 px-3 mb-3 rounded-3 small border-0 shadow-sm";
                        warningBanner.innerHTML = `
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <i class="bi bi-exclamation-triangle-fill text-warning me-2"></i>
                                    <span>Sub-optimal design. Query diagnostics score: <b class="text-warning font-monospace">${analysis.score}</b>/100.</span>
                                </div>
                                <button class="btn btn-sm btn-outline-warning py-0 px-2 fw-bold" style="font-size: 11px;" onclick="bootstrap.Tab.getOrCreateInstance(document.getElementById('quality-tab')).show();">
                                    VIEW OPTIMIZATIONS
                                </button>
                            </div>
                        `;
                    }
                } else {
                    warningBanner.classList.add('d-none');
                }
            }

            // Main Quality Tab Card contents
            const scoreNum = document.getElementById('quality-score-num');
            const scoreCircle = document.getElementById('quality-score-circle');
            const gradeTitle = document.getElementById('quality-grade');
            const verdictText = document.getElementById('quality-verdict');
            const rulesList = document.getElementById('quality-rules-list');

            if (scoreNum && scoreCircle && gradeTitle && verdictText && rulesList) {
                scoreNum.innerText = analysis.score;
                
                // SVG circular stroke animation metrics calculation (dasharray parameter matches 377 units)
                const circleOffset = 377 - (377 * analysis.score) / 100;
                scoreCircle.style.strokeDashoffset = circleOffset;

                if (analysis.score >= 90) {
                    scoreCircle.setAttribute('stroke', 'var(--tokyo-success)');
                    gradeTitle.className = "font-monospace fw-bold text-success mt-2";
                } else if (analysis.score >= 75) {
                    scoreCircle.setAttribute('stroke', 'var(--tokyo-accent)');
                    gradeTitle.className = "font-monospace fw-bold text-info mt-2";
                } else if (analysis.score >= 60) {
                    scoreCircle.setAttribute('stroke', 'var(--tokyo-warn)');
                    gradeTitle.className = "font-monospace fw-bold text-warning mt-2";
                } else {
                    scoreCircle.setAttribute('stroke', 'var(--tokyo-error)');
                    gradeTitle.className = "font-monospace fw-bold text-danger mt-2";
                }

                gradeTitle.innerText = `GRADE ${analysis.grade}`;
                verdictText.innerText = analysis.verdict;

                if (analysis.rules.length === 0) {
                    rulesList.innerHTML = `
                        <div class="text-center p-5 text-white-50 bg-dark bg-opacity-10 rounded-3">
                            <i class="bi bi-terminal fs-2 mb-3 text-secondary"></i>
                            <p class="small m-0">Write a SQL statement in the active terminal to execute diagnostics parsing processes.</p>
                        </div>
                    `;
                    return;
                }

                let rulesHtml = '';
                analysis.rules.forEach(rule => {
                    let badgeClass = 'bg-success bg-opacity-15 text-success';
                    let iconClass = 'bi-check-circle-fill text-success';
                    let borderClass = 'border-success border-opacity-10';
                    let deductionElement = '';

                    if (rule.status === 'warning') {
                        badgeClass = 'bg-warning bg-opacity-15 text-warning';
                        iconClass = 'bi-exclamation-triangle-fill text-warning';
                        borderClass = 'border-warning border-opacity-10';
                        deductionElement = `<span class="badge bg-danger bg-opacity-25 text-danger font-monospace py-1 ms-2" style="font-size: 11px;">-${rule.deduction} pts</span>`;
                    } else if (rule.status === 'failed') {
                        badgeClass = 'bg-danger bg-opacity-15 text-danger';
                        iconClass = 'bi-shield-x-fill text-danger';
                        borderClass = 'border-danger border-opacity-10';
                        deductionElement = `<span class="badge bg-danger bg-opacity-25 text-danger font-monospace py-1 ms-2" style="font-size: 11px;">-${rule.deduction} pts</span>`;
                    }

                    rulesHtml += `
                        <div class="p-3 rounded-3 border ${borderClass} bg-dark bg-opacity-10 mb-2 transition-all">
                            <div class="d-flex align-items-start gap-3">
                                <i class="bi ${iconClass} fs-5 mt-0"></i>
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                        <b class="small text-light" style="font-size: 14px;">${rule.name}</b>
                                        <div class="d-flex align-items-center">
                                            <span class="badge ${badgeClass} text-uppercase font-monospace" style="font-size: 10px; letter-spacing: 0.5px;">${rule.status}</span>
                                            ${deductionElement}
                                        </div>
                                    </div>
                                    <p class="small text-white-50 mb-2" style="font-size: 12.5px; line-height: 1.4;">${rule.message}</p>
                                    <div class="p-2 rounded border-start border-3 border-info" style="font-size: 12px; background-color: rgba(122,162,247,0.05);">
                                        <span class="text-info fw-bold"><i class="bi bi-lightbulb me-1"></i>OPTIMIZATION KEY:</span>
                                        <span class="text-white-50">${rule.tip}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                });
                rulesList.innerHTML = rulesHtml;
            }
        }

        /**
         * Enhanced API Interactor
         * Resolves relative paths to absolute origins to prevent URL parsing exceptions in sandboxed or blob environments.
         */
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
                
                const result = await response.json().catch(() => ({}));
                // Prevent throwing hard errors if the server returned a clean HTTP 200 execution log flag
                if (!response.ok && result.success !== false) throw new Error(result.error || `Server Error ${response.status}`);
                return result;
            } catch (error) { 
                console.error(`[CRITICAL] API [${action}] failed:`, error);
                throw error; 
            }
        }

        // --- EDITOR & INTELLISENSE ARCHITECTURE ---

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
            hintOptions: {
                tables: dbTables // Populated asynchronously via fetchTables()
            }
        });

        // Live Event: Trigger autocomplete as user inputs valid SQL tokens
        editor.on("inputRead", function(cm, change) {
            if (change.text[0].match(/[a-z0-9._]/i)) {
                cm.showHint({ completeSingle: false });
            }
        });

        // Live Event: Syntax Auditor and Safety Validator (Merged with Quality Diagnostics Engine)
        editor.on('change', () => {
            const code = editor.getValue();
            const normalized = code.toLowerCase().trim();
            const hint = document.getElementById('performance-hint');
            
            // Execute automated diagnostics real-time update
            renderQualityReport(code);

            if(!normalized) { hint.innerHTML = ''; return; }

            // Logical validation rules
            if (normalized.includes('delete') && !normalized.includes('where')) {
                hint.innerHTML = '<span class="text-danger fw-bold shadow-sm px-2 py-1 rounded bg-black border border-danger border-opacity-25"><i class="bi bi-shield-lock-fill me-1"></i> CRITICAL: Unscoped DELETE detected!</span>';
            } else if (normalized.includes('update') && !normalized.includes('where')) {
                hint.innerHTML = '<span class="text-danger fw-bold shadow-sm px-2 py-1 rounded bg-black border border-danger border-opacity-25"><i class="bi bi-exclamation-triangle-fill me-1"></i> RISK: No WHERE clause on UPDATE!</span>';
            } else if (normalized.includes('select *')) {
                hint.innerHTML = '<span class="text-info fw-bold shadow-sm px-2 py-1 rounded bg-black border border-info border-opacity-25"><i class="bi bi-speedometer me-1"></i> TIP: Project specific columns for performance.</span>';
            } else if (/\b(seletc|fromm|wher|joim|inserted|udpate)\b/i.test(normalized)) {
                hint.innerHTML = '<span class="text-warning fw-bold shadow-sm px-2 py-1 rounded bg-black border border-warning border-opacity-25"><i class="bi bi-spellcheck me-1"></i> Potential syntax typo detected.</span>';
            } else {
                hint.innerHTML = '<span class="text-success small opacity-75"><i class="bi bi-check2-circle"></i> SQL Syntax valid.</span>';
            }
        });

        // --- CORE FUNCTIONALITY ---
        
        
        // --- UNIFIED HIGH FIDELITY RUNTIME INITIALIZATION ENGINE ---
            window.addEventListener('load', async () => {
                // 1. Immediately build option targets out of backend catalog system
                await rebuildDBDropdowns();
                
                // 2. Clear standard application layouts
                renderHistory(); 
                renderQuizHome(); 
                
                // 3. Coordinate gate verification checks mapping
                const sessionCachedName = sessionStorage.getItem('sqlLabUsername');
                if (!sessionCachedName) {
                    bootstrap.Modal.getOrCreateInstance(document.getElementById('studentRegistrationModal')).show();
                } else {
                    applyVerifiedStudentIdentity(sessionCachedName);
                    dbMode = 'ro'; // Always boot safely to primary systemic read-only setup mode
                    fetchTables(); 
                }
            });

        // Process Registration Check-In Form Trigger
// Primary Submission workflow: Registers or Authenticates into selected target environments
// document.getElementById('submit-onboarding-btn').onclick = async () => {
//     const nameInput = document.getElementById('onboarding-input-name').value.trim();
//     const dbChoice = document.getElementById('onboarding-db-selector').value;
//     const passwordInput = document.getElementById('onboarding-input-pass').value.trim();
//     const errorBanner = document.getElementById('onboarding-error-area');
    
//     // Identity is always required
//     if (!nameInput) {
//         errorBanner.innerText = "Student identity tracking name is required.";
//         errorBanner.classList.remove('d-none');
//         return;
//     }

//     // Password Enforcement Bypass Check: Only custom databases require a password
//     const isCustomDb = dbChoice === 'custom_new' || dbChoice.startsWith('custom_');
//     if (isCustomDb && !passwordInput) {
//         errorBanner.innerText = "A password validation key is required to connect to custom workspaces.";
//         errorBanner.classList.remove('d-none');
//         return;
//     }

//     sessionStorage.setItem('sqlLabUsername', nameInput);
//     applyVerifiedStudentIdentity(nameInput);
    
//     // Save password for this active session (blank for system ro/rw)
//     currentSessionPassword = passwordInput;

//     try {
//         errorBanner.classList.add('d-none');

//         // Flow A: User is submitting a completely new environment catalog record
//         if (dbChoice === 'custom_new') {
//             const host = document.getElementById('custom-db-host').value.trim();
//             const dbName = document.getElementById('custom-db-name').value.trim();
//             const dbUser = document.getElementById('custom-db-user').value.trim();

//             if (!host || !dbName || !dbUser) {
//                 errorBanner.innerText = "Please complete all target host deployment parameters.";
//                 errorBanner.classList.remove('d-none');
//                 return;
//             }

//             const baseUrl = window.location.origin + window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/') + 1);
//             const registerCall = await fetch(`${baseUrl}api.php?action=register_new_db`, {
//                 method: 'POST',
//                 headers: { 'Content-Type': 'application/json' },
//                 body: JSON.stringify({ student_name: nameInput, host, name: dbName, user: dbUser, pass: passwordInput })
//             });
            
//             const registerRes = await registerCall.json();
//             if (!registerCall.ok || registerRes.error) {
//                 throw new Error(registerRes.error || "Master ledger catalog validation error.");
//             }
            
//             dbMode = `custom_${dbName}`;
//         } else {
//             // Flow B: User selected System databases or an existing custom profile
//             dbMode = dbChoice;
//         }

//         // 1. Instantly test connection and sync tables layout mapping
//         await fetchTables();
        
//         // 2. Refresh database menu options from central server catalog definitions
//         await rebuildDBDropdowns();
        
//         // 3. Bind value selectors cleanly onto the main navbar dropdown
//         const mainSelect = document.getElementById('db-mode-select');
//         if (mainSelect) {
//             mainSelect.value = dbMode;
//         }
        
//         bootstrap.Modal.getInstance(document.getElementById('studentRegistrationModal')).hide();
//     } catch(err) {
//         errorBanner.innerText = `Workspace Login Rejected: ${err.message}`;
//         errorBanner.classList.remove('d-none');
//         document.getElementById('db-mode-select').value = dbMode;
//     }
// };


// Primary Submission validation gateway logic
document.getElementById('submit-onboarding-btn').onclick = async () => {
    const nameInput = document.getElementById('onboarding-input-name').value.trim();
    const dbChoice = document.getElementById('onboarding-db-selector').value;
    const passwordInput = document.getElementById('onboarding-input-pass').value.trim();
    const errorBanner = document.getElementById('onboarding-error-area');
    
    // Rule 1: Student tracking user name is absolutely mandatory for all profiles
    if (!nameInput) {
        errorBanner.innerHTML = '<i class="bi bi-exclamation-circle me-1"></i> Student identity tracking name is strictly required.';
        errorBanner.classList.remove('d-none');
        return;
    }

    // Rule 2: Enforce password parameters purely on external custom workspaces
    const isCustomDb = dbChoice === 'custom_new' || dbChoice.startsWith('custom_');
    if (isCustomDb && !passwordInput) {
        errorBanner.innerHTML = '<i class="bi bi-exclamation-circle me-1"></i> Access validation token/password is mandatory for custom workspaces.';
        errorBanner.classList.remove('d-none');
        return;
    }

    try {
        errorBanner.classList.add('d-none');

        // Flow A: User is submitting a completely new environment catalog record
        if (dbChoice === 'custom_new') {
            const host = document.getElementById('custom-db-host').value.trim();
            const dbName = document.getElementById('custom-db-name').value.trim();
            const dbUser = document.getElementById('custom-db-user').value.trim();

            if (!host || !dbName || !dbUser) {
                errorBanner.innerHTML = '<i class="bi bi-exclamation-circle me-1"></i> Please complete all target host deployment parameters.';
                errorBanner.classList.remove('d-none');
                return;
            }

            const baseUrl = window.location.origin + window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/') + 1);
            const registerCall = await fetch(`${baseUrl}api.php?action=register_new_db`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ student_name: nameInput, host, name: dbName, user: dbUser, pass: passwordInput })
            });
            
            const registerRes = await registerCall.json();
            if (!registerCall.ok || registerRes.error) {
                throw new Error(registerRes.error || "Master ledger catalog validation error.");
            }
            
            dbMode = `custom_${dbName}`;
            currentSessionPassword = passwordInput;
        } else {
            // Flow B: User selected an existing environment profile configuration block
            dbMode = dbChoice;
            currentSessionPassword = passwordInput;

            // CRITICAL HANDSHAKE VALIDATION ENFORCEMENT
            if (dbChoice.startsWith('custom_')) {
                const baseUrl = window.location.origin + window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/') + 1);
                const verifyCall = await fetch(`${baseUrl}api.php?action=verify_db_login`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ db_mode: dbMode, db_pass: currentSessionPassword })
                });
                
                const verifyRes = await verifyCall.json();
                if (!verifyCall.ok || verifyRes.success !== true) {
                    throw new Error("Authentication Error: Invalid login credentials validation token.");
                }
            }
        }

        // Apply identity values safely post routing validation checks
        sessionStorage.setItem('sqlLabUsername', nameInput);
        applyVerifiedStudentIdentity(nameInput);

        // Test database sync mapping properties layout
        await fetchTables();
        await rebuildDBDropdowns();
        document.getElementById('db-mode-select').value = dbMode;
        bootstrap.Modal.getInstance(document.getElementById('studentRegistrationModal')).hide();
    } catch(err) {
        // Intercept bad password entries and output your custom WhatsApp administrator support gateway parameters
        if (err.message.includes("Authentication Error") || err.message.includes("Invalid login credentials")) {
            const encodedMsg = encodeURIComponent("Hi Admin, I forgot/want to reset my SQL Lab workspace password. Please assist.");
            errorBanner.innerHTML = `
                <div class="p-2 border border-danger border-opacity-25 rounded bg-danger bg-opacity-10">
                    <i class="bi bi-shield-x me-1"></i> <strong>Wrong Password!</strong><br>
                    If you want to reset, please reach out to: <br>
                    <a href="https://wa.me/919677394953?text=${encodedMsg}" target="_blank" class="btn btn-sm btn-success mt-2 fw-bold text-white font-monospace">
                        <i class="bi bi-whatsapp me-1"></i> Contact Skills Builder Hub Admin
                    </a>
                </div>
            `;
        } else {
            errorBanner.innerHTML = `<i class="bi bi-exclamation-triangle-fill me-1"></i> Workspace Login Rejected: ${err.message}`;
        }
        errorBanner.classList.remove('d-none');
        
        // Reset defaults silently to stay secure
        currentSessionPassword = '';
        document.getElementById('db-mode-select').value = 'ro';
    }
};

        function applyVerifiedStudentIdentity(name) {
            activeStudentName = name;
            document.getElementById('active-student-username').innerText = name;
            document.getElementById('student-identity-badge').classList.remove('d-none');
        }
        
        document.getElementById('db-mode-select').addEventListener('change', (e) => {
            dbMode = e.target.value;
            fetchTables(); // Re-sync dictionary when context changes
        });

        /**
         * Rebuilds Object Explorer and IntelliSense dictionaries
         */
        /**
 * Rebuilds Object Explorer and IntelliSense dictionaries
 */
async function fetchTables() {
    try {
        const result = await fetchAPI('get_tables', {});
        const list = document.getElementById('schema-list');
        if (!list) return;
        
        list.innerHTML = '';
        dbTables = {}; // Flush old registry
        
        if (!result.tables || result.tables.length === 0) {
            list.innerHTML = '<div class="text-white-50 text-center p-4 small italic">Dictionary is currently empty.</div>';
            return;
        }

        result.tables.forEach(tableName => {
            dbTables[tableName] = []; // Map table into CodeMirror autocomplete registry
            
            const row = document.createElement('div');
            row.className = 'd-flex justify-content-between align-items-center p-1 rounded-2 transition-all hover-bg-dark';
            row.innerHTML = `
                <button class="btn btn-outline-secondary text-start btn-sm flex-grow-1 me-1 text-truncate border-0 font-monospace" 
                        onclick="editor.setValue('SELECT * FROM \\\`${tableName}\\\` LIMIT 100;'); editor.focus();">
                    <i class="bi bi-table text-info me-2 opacity-50"></i>${tableName}
                </button>
                <div class="schema-btn-group">
                    <button class="btn schema-btn" title="Inspect Definition" onclick="profileTable('${tableName}')">
                        <i class="bi bi-info-circle"></i>
                    </button>
                </div>
            `;
            list.appendChild(row);
        });
        
        // Propagate updated metadata to the hinting engine
        editor.setOption("hintOptions", { tables: dbTables });
        
        const connIndicator = document.getElementById('connection-indicator');
        if (connIndicator) connIndicator.classList.remove('d-none');
    } catch (error) { 
        console.error("Dictionary lookup aborted:", error);
        const list = document.getElementById('schema-list');
        if (list) list.innerHTML = `<div class="alert alert-danger x-small p-2 mx-2">Dictionary sync failed.</div>`; 
    }
}

        /**
         * Primary Query Execution Lifecycle
         */
async function executeQuery() {
            const query = editor.getValue().trim();
            if (!query) return;

            setButtonLoading(true, document.getElementById('btn-text'), document.getElementById('btn-loader'));
            document.getElementById('execution-analytics').classList.add('d-none');
            const msgArea = document.getElementById('msg-area');
            msgArea.className = "alert alert-info small py-3 text-center bg-info bg-opacity-10 border-info border-opacity-25";
            msgArea.innerHTML = '<div class="spinner-border spinner-border-sm me-2"></div> Committing transaction...';

            try {
                // Immediately refresh quality dashboard when execution is committed
                renderQualityReport(query);

                const result = await fetchAPI('run_query', { query, student_name: activeStudentName });
                
                // Unconditionally add to session history array
                addToHistory(query);
                
                // Immediately force reload Global History View tab tracking if visible
                fetchSharedHistory();

                // Intercept execution errors without throwing an exception out of the script logic loop
                if (result.success === false || result.error) {
                    const traceErr = result.sql_error || result.error || 'Syntax evaluation failed.';
                    displayMessage('error', traceErr + (result.suggested_correction ? ` | Did you mean: ${result.suggested_correction}` : ''));
                    return;
                }

                currentResults = result;
                const duration = parseFloat(result.execution_time);
                document.getElementById('execution-analytics').classList.remove('d-none');
                document.getElementById('stat-speed').innerText = duration > 0 ? Math.round(result.data.length/duration) : result.data.length;
                document.getElementById('stat-latency').innerText = Math.round(duration * 1000);
                document.getElementById('stat-count').innerText = result.data.length;
                
                const rank = document.getElementById('performance-rank');
                if(duration < 0.1) { rank.innerText = 'High Speed'; rank.className = 'performance-badge bg-success text-white shadow-sm'; }
                else if(duration < 0.5) { rank.innerText = 'Optimal'; rank.className = 'performance-badge bg-primary text-white'; }
                else { rank.innerText = 'Sub-Optimal'; rank.className = 'performance-badge bg-warning text-dark'; }

                displayResults(result.headers, result.data, result.execution_time);
                
                if (dbMode === 'rw' && !/^\s*SELECT/i.test(query)) {
                    fetchTables();
                }
            } catch (error) { 
                displayMessage('error', error.message); 
            } finally { 
                setButtonLoading(false, document.getElementById('btn-text'), document.getElementById('btn-loader')); 
            }
        }

        /**
         * Engineering Utility: Explain Plan Generator
         */
        async function fetchExecutionPlan() {
            const query = editor.getValue().trim();
            const header = document.getElementById('plan-header');
            const body = document.getElementById('plan-body');
            
            if(!query || !/^\s*SELECT/i.test(query)) { 
                body.innerHTML = '<tr><td class="p-5 text-center text-white-50 small italic">Select a DQL statement above to generate an execution plan.</td></tr>'; 
                return; 
            }

            body.innerHTML = '<tr><td class="p-4 text-center"><div class="spinner-border spinner-border-sm text-info me-2"></div> Generating path...</td></tr>';
            try {
                const res = await fetchAPI('get_execution_plan', { query });
                header.innerHTML = `<tr>${res.headers.map(h => `<th>${h}</th>`).join('')}</tr>`;
                body.innerHTML = res.data.map(r => `<tr>${res.headers.map(h => `<td>${r[h] ?? '<small class="text-white-50">NULL</small>'}</td>`).join('')}</tr>`).join('');
            } catch(e) { 
                body.innerHTML = `<tr><td class="text-danger p-4 text-center fw-bold">${e.message}</td></tr>`; 
            }
        }

        /**
         * Engineering Utility: Table Schema Profiler
         */
        async function profileTable(table) {
            bootstrap.Tab.getOrCreateInstance(document.getElementById('plan-tab')).show();
            const header = document.getElementById('plan-header');
            const body = document.getElementById('plan-body');
            body.innerHTML = '<tr><td class="p-4 text-center"><div class="spinner-border spinner-border-sm text-info me-2"></div> Cataloging schema...</td></tr>';
            
            try {
                const res = await fetchAPI('describe_table', { table });
                header.innerHTML = `<tr>${res.headers.map(h => `<th>${h}</th>`).join('')}</tr>`;
                body.innerHTML = res.data.map(r => `<tr>${res.headers.map(h => `<td>${r[h] ?? 'NULL'}</td>`).join('')}</tr>`).join('');
            } catch(e) { 
                body.innerHTML = `<td class="text-danger p-4 text-center fw-bold">${e.message}</td>`; 
            }
        }

        /**
         * Copy text to user clipboard utility context
         */
        function copyTextToClipboard(base64Text, btnElement) {
            const rawText = decodeURIComponent(escape(atob(base64Text)));
            navigator.clipboard.writeText(rawText).then(() => {
                const originalHtml = btnElement.innerHTML;
                btnElement.innerHTML = '<i class="bi bi-check-lg text-success"></i>';
                setTimeout(() => { btnElement.innerHTML = originalHtml; }, 1500);
            }).catch(err => {
                console.error('Failed to copy metadata snippet: ', err);
            });
        }

        /**
         * Global Telemetry: Shared User Feed
         * Updated: IST Conversion + Enhanced Error Logging + Failure State Capture
         */
// async function fetchSharedHistory() {
//             const body = document.getElementById('shared-history-body');
//             const nameSearchString = document.getElementById('history-name-search').value.trim();
            
//             body.innerHTML = '<tr><td colspan="8" class="text-center p-5"><div class="spinner-border spinner-border-sm text-info mb-3"></div><br><span class="text-white-50">Syncing user feed from DB...</span></td></tr>';
            
//             try {
//                 const data = await fetchAPI('get_history', { student_name: nameSearchString });
                
//                 if (!data.history || data.history.length === 0) {
//                     body.innerHTML = '<tr><td colspan="8" class="p-5 text-center text-white-50">Global log is currently empty.</td></tr>';
//                     return;
//                 }
                
//                 let historyHtml = '';
//                 data.history.forEach((h, index) => {
//                     const encodedQuery = btoa(unescape(encodeURIComponent(h.query_text || '')));
//                     const collapseId = `globalHistoryCollapse_${index}`;
//                     const errorCollapseId = `errorCollapse_${index}`;
//                     const isFailed = (h.status === 'failed' || !h.status);
                    
//                     const dynamicLatency = (h.duration !== null && h.duration !== undefined) ? h.duration + 's' : '0.0000s';
//                     const dynamicRecords = (h.row_count !== null && h.row_count !== undefined) ? h.row_count : '0';
//                     const dynamicStudentName = h.student_name ? h.student_name : 'Anonymous';
                    
//                     let inlineErrorColumn = '';
//                     if (isFailed) {
//                         const cleanErrorString = h.error_log ? h.error_log : 'Syntax or configuration mismatch exception.';
                        
//                         inlineErrorColumn = `
// <div class="dropdown">
//     <button class="btn btn-sm btn-outline-danger dropdown-toggle py-1 px-3 font-monospace"
//             type="button"
//             data-bs-toggle="dropdown"
//             aria-expanded="false"
//             style="font-size: 13px; letter-spacing: 0.5px;">
//         <i class="bi bi-bug-fill me-1"></i>VIEW ERROR
//     </button>

//     <ul class="dropdown-menu p-4 shadow-lg border-danger border-opacity-25"
//         style="
//             background-color: var(--tokyo-card);
//             min-width: 600px;
//             max-width: 800px;
//             max-height: 500px;
//             overflow-y: auto;
//             white-space: normal;
//             word-break: break-word;
//             border-radius: 12px;
//         ">

//         <li>
//             <!-- Header -->
//             <div class="d-flex justify-content-between align-items-center mb-3">
//                 <div class="text-danger fw-bold text-uppercase font-monospace"
//                      style="letter-spacing: 1px; font-size: 14px;">
//                     MySQL Exception
//                 </div>
//                 <!-- Copy Button -->
//                 <button class="btn btn-sm btn-outline-secondary"
//                         onclick="copyError(this)"
//                         style="font-size: 12px;">
//                     <i class="bi bi-clipboard me-1"></i>Copy Error
//                 </button>
//             </div>

//             <!-- Error Content -->
//             <div class="text-light font-monospace"
//                  style="
//                     font-size: 14px;
//                     line-height: 1.8;
//                     white-space: pre-wrap;
//                     background-color: rgba(0,0,0,0.2);
//                     padding: 16px;
//                     border-radius: 8px;
//                     border-left: 4px solid #dc3545;
//                  "
//                  id="errorMessage">${cleanErrorString}</div>
//         </li>
//     </ul>
// </div>`;
//                     } else {
//                         inlineErrorColumn = `<span class="text-white-50 opacity-25 x-small italic font-monospace">NULL</span>`;
//                     }
                    
//                     // --- BULLETPROOF UTC TO IST CONVERSION ---
//                     let istTime = 'N/A';
//                     if (h.started_at) {
//                         let utcNormalizedString = h.started_at.trim().replace(" ", "T");
//                         if (!utcNormalizedString.endsWith("Z")) {
//                             utcNormalizedString += "Z";
//                         }
                        
//                         istTime = new Date(utcNormalizedString).toLocaleString('en-IN', {
//                             timeZone: 'Asia/Kolkata',
//                             day: '2-digit',
//                             month: 'short',
//                             year: 'numeric',
//                             hour: '2-digit',
//                             minute: '2-digit',
//                             second: '2-digit',
//                             hour12: true
//                         });
//                     }
                    
//                     historyHtml += `
//                         <tr class="${isFailed ? 'bg-danger bg-opacity-10' : ''}">
//                             <td class="text-center">
//                                 <i class="status-pill ${isFailed ? 'status-failed' : 'status-success'}"></i>
//                             </td>
//                             <td class="small fw-bold ${isFailed ? 'text-danger' : 'text-light'} font-monospace">
//                                 ${dynamicStudentName}
//                             </td>
//                             <td class="small text-white-50 font-monospace">${istTime}</td>
//                             <td class="small text-info">${dynamicLatency}</td>
//                             <td><span class="badge ${isFailed ? 'bg-danger' : 'bg-secondary'} rounded-pill">${dynamicRecords}</span></td>
                            
//                             <td>${inlineErrorColumn}</td>
                            
//                             <td>
//                                 <div class="d-flex align-items-center gap-1">
//                                     <button class="btn btn-sm text-info p-0 border-0 me-1" type="button" data-bs-toggle="collapse" data-bs-target="#${collapseId}" aria-expanded="false">
//                                         <i class="bi bi-chevron-down text-secondary"></i>
//                                     </button>
//                                     <code class="sql-history-code ${isFailed ? 'border-danger text-danger' : ''}">${h.query_text}</code>
                                    
//                                     ${isFailed ? `
//                                         <span class="d-inline-flex align-items-center justify-content-center ms-1" style="width: 24px; height: 24px; min-width: 24px;">
//                                             <lord-icon
//                                                 src="https://cdn.lordicon.com/usownftb.json"
//                                                 trigger="loop"
//                                                 delay="200"
//                                                 colors="primary:#ff3333,secondary:#ffffff"
//                                                 style="width:24px;height:24px;">
//                                             </lord-icon>
//                                         </span>
//                                     ` : ''}
                                    
//                                     <button class="btn btn-sm p-1 text-secondary border-0 hover-text-info" title="Copy Statement" onclick="copyTextToClipboard('${encodedQuery}', this)">
//                                         <i class="bi bi-copy" style="font-size: 12px;"></i>
//                                     </button>
//                                 </div>
//                             </td>
                            
//                             <td>
//                                 <button class="btn btn-sm ${isFailed ? 'btn-outline-danger' : 'btn-info'} py-0 px-3 fw-bold ${isFailed ? '' : 'text-white'} shadow-sm" onclick="loadSQLToEditor('${encodedQuery}')">
//                                     LOAD
//                                 </button>
//                             </td>
//                         </tr>
                        
//                         <tr class="collapse" id="${collapseId}">
//                             <td colspan="8" class="p-1 bg-black bg-opacity-20 border-bottom border-secondary border-opacity-10">
//                                 <div class="p-2 rounded position-relative small" style="background:#111219;">
//                                     <pre class="m-0 pe-4 font-monospace text-wrap ${isFailed ? 'text-danger' : 'text-success'}" style="font-size:12px; line-height:1.3;">${h.query_text}</pre>
//                                 </div>
//                             </td>
//                         </tr>

//                         ${isFailed ? `
//                         <tr class="collapse" id="${errorCollapseId}">
//                             <td colspan="8" class="p-0">
//                                 <div class="alert alert-danger mb-0 rounded-0 border-0 small py-2 px-4 font-monospace" style="font-size: 11px; background-color: rgba(247, 118, 142, 0.15); color: #f7768e;">
//                                     <i class="bi bi-bug-fill me-2"></i><strong>ENGINE_EXCEPTION_LOG:</strong> ${h.error_log || 'Syntax exception tracing failure.'}
//                                 </div>
//                             </td>
//                         </tr>` : ''}
//                     `;
//                 });
//                 body.innerHTML = historyHtml;
//             } catch(e) { 
//                 console.error("[Persistence UI Error]", e);
//                 body.innerHTML = `<tr><td colspan="8" class="text-danger p-4 text-center fw-bold"><i class="bi bi-cloud-slash me-2"></i>History Render Dropout.</td></tr>`; 
//             }
//         }

async function fetchSharedHistory() {
    const body = document.getElementById('shared-history-body');
    const nameSearchString = document.getElementById('history-name-search').value.trim();
    
    body.innerHTML = '<tr><td colspan="9" class="text-center p-5"><div class="spinner-border spinner-border-sm text-info mb-3"></div><br><span class="text-white-50">Syncing user feed...</span></td></tr>';
    
    try {
        const data = await fetchAPI('get_history', { 
            search: nameSearchString,
            student_name: nameSearchString 
        });
        
        let metricsContainer = document.getElementById('history-metrics-display');
        if (!metricsContainer) {
            metricsContainer = document.createElement('div');
            metricsContainer.id = 'history-metrics-display';
            metricsContainer.className = 'd-flex gap-3 mb-3 small font-monospace align-items-center';
            document.getElementById('shared-history-panel').insertBefore(metricsContainer, document.getElementById('shared-history-panel').children[1]);
        }
        
        const countBefore = data.records_before_filter || (data.history ? data.history.length : 0);
        const countAfter = data.records_after_filter !== undefined ? data.records_after_filter : (data.history ? data.history.length : 0);

        metricsContainer.innerHTML = `
            <span class="badge bg-dark border border-secondary text-white-50 p-2">Total Records (Before Filter): <b class="text-info">${countBefore}</b></span>
            <span class="badge bg-dark border border-secondary text-white-50 p-2">Matching Records (After Filter): <b class="text-warning">${countAfter}</b></span>
            <button class="btn btn-sm btn-outline-success ms-auto fw-bold py-1 px-3" onclick="exportHistoryToCSV()">
                <i class="bi bi-file-earmark-spreadsheet me-1"></i> EXPORT HISTORY CSV
            </button>
            <button class="btn btn-sm btn-outline-danger fw-bold py-1 px-3" disabled title="Reset feature disabled for security.">
                <i class="bi bi-shield-lock-fill me-1"></i> RESET DISABLED
            </button>
        `;

        if (!data.history || data.history.length === 0) {
            body.innerHTML = '<tr><td colspan="9" class="p-5 text-center text-white-50">No query history records match the criteria.</td></tr>';
            return;
        }
        
        window.cachedHistoryMetadata = data.history;

        let historyHtml = '';
        data.history.forEach((h, index) => {
            const encodedQuery = btoa(unescape(encodeURIComponent(h.query_text || '')));
            const collapseId = `globalHistoryCollapse_${index}`;
            const errorCollapseId = `globalErrorCollapse_${index}`; // Unique ID for the error container
            const notesCollapseId = `globalNotesCollapse_${index}`;
            const noteInputId = `globalNoteInput_${index}`;
            const isFailed = (h.status === 'failed' || h.status === 'FAILED' || !h.status);
            
            const dynamicLatency = h.duration ? h.duration + 's' : '0.0000s';
            const dynamicRecords = h.row_count ? h.row_count : '0';
            const dynamicStudentName = h.student_name ? h.student_name : 'Anonymous';
            
            // --- FAIL-SAFE ERROR DIRECT VIEW BUTTON ---
            let inlineErrorColumn = '';
            if (isFailed) {
                inlineErrorColumn = `
                <button class="btn btn-sm btn-danger fw-bold font-monospace py-0 px-2 shadow-sm animate-pulse" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#${errorCollapseId}"
                        style="font-size: 11px; letter-spacing: 0.5px;">
                    <i class="bi bi-exclamation-octagon-fill me-1"></i>VIEW ERROR
                </button>`;
            } else {
                inlineErrorColumn = `<span class="text-white-50 opacity-25 x-small italic font-monospace">NULL</span>`;
            }
            
            let istTime = 'N/A';
            if (h.started_at) {
                let utcNormalizedString = h.started_at.trim().replace(" ", "T") + (h.started_at.trim().endsWith("Z") ? "" : "Z");
                istTime = new Date(utcNormalizedString).toLocaleString('en-IN', {
                    timeZone: 'Asia/Kolkata', hour12: true,
                    day: '2-digit', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit'
                });
            }

            const noteCount = h.note_count ? parseInt(h.note_count, 10) : 0;
            const latestNoteHtml = h.latest_note
                ? `<span class="small text-warning font-monospace" style="white-space:pre-wrap;">${escapeHtml(h.latest_note)}</span>`
                : `<span class="text-white-50 opacity-25 x-small italic font-monospace">No notes yet</span>`;
            const historyToggleHtml = noteCount > 1
                ? `<button class="btn btn-sm btn-outline-warning py-0 px-2 x-small" type="button" data-bs-toggle="collapse" data-bs-target="#${notesCollapseId}" onclick="loadNoteHistory(${h.id}, '${notesCollapseId}', this)">${noteCount} notes</button>`
                : '';

            let notesColumn = `
                <div class="d-flex flex-column gap-1" style="min-width:180px;">
                    <div class="d-flex align-items-center gap-1">${latestNoteHtml}${historyToggleHtml}</div>
                    <div class="d-flex gap-1">
                        <input type="text" id="${noteInputId}" class="form-control form-control-sm bg-dark text-light border-secondary" placeholder="Add note..." style="font-size:11px;">
                        <button class="btn btn-sm btn-outline-info py-0 px-2 x-small" onclick="saveQueryNote(${h.id}, document.getElementById('${noteInputId}'))">ADD</button>
                    </div>
                </div>`;

            historyHtml += `
                <tr class="${isFailed ? 'bg-danger bg-opacity-10' : ''}">
                    <td class="text-center"><i class="status-pill ${isFailed ? 'status-failed' : 'status-success'}"></i></td>
                    <td class="small fw-bold ${isFailed ? 'text-danger' : 'text-light'} font-monospace">${dynamicStudentName}</td>
                    <td class="small text-white-50 font-monospace">${istTime}</td>
                    <td class="small text-info">${dynamicLatency}</td>
                    <td><span class="badge ${isFailed ? 'bg-danger' : 'bg-secondary'} rounded-pill">${dynamicRecords}</span></td>
                    
                    <td>${inlineErrorColumn}</td>
                    
                    <td>
                        <div class="d-flex align-items-center gap-1">
                            <button class="btn btn-sm text-info p-0 border-0 me-1" type="button" data-bs-toggle="collapse" data-bs-target="#${collapseId}"><i class="bi bi-chevron-down"></i></button>
                            <code class="sql-history-code ${isFailed ? 'border-danger text-danger' : ''}">${h.query_text}</code>
                        </div>
                    </td>
                    <td>${notesColumn}</td>
                    <td><button class="btn btn-sm ${isFailed ? 'btn-outline-danger' : 'btn-info'} py-0 px-3 fw-bold text-white" onclick="loadSQLToEditor('${encodedQuery}')">LOAD</button></td>
                </tr>

                <tr class="collapse" id="${notesCollapseId}" style="background-color: #16161e;">
                    <td colspan="9" class="py-1 px-3 border-0">
                        <div class="notes-history-body small font-monospace text-white-50" style="font-size:12px;">Loading notes history...</div>
                    </td>
                </tr>

                <tr class="collapse" id="${errorCollapseId}" style="background-color: #16161e;">
                    <td colspan="9" class="py-1 px-3 border-0">
                        <div class="d-flex align-items-center gap-2 rounded border border-danger border-opacity-25 px-2 py-1.5 my-1" 
                             style="background-color: rgba(247, 118, 142, 0.06); color: #f7768e; font-family: 'Roboto Mono', monospace; font-size: 12px;">
                            <div class="text-danger fw-bold text-uppercase flex-shrink-0" style="font-size: 10px; letter-spacing: 0.5px;">
                                <i class="bi bi-bug-fill me-1"></i>MySQL Error:
                            </div>
                            <div class="text-light opacity-90 text-wrap text-start w-100 m-0" 
                                 style="line-height: 1.4; white-space: pre-wrap; word-break: break-word;">${h.error_log || 'Syntax or runtime configuration mismatch exception.'}</div>
                        </div>
                    </td>
                </tr>

                <tr class="collapse" id="${collapseId}">
                    <td colspan="9" class="p-2" style="background:#111219;">
                        <pre class="m-0 p-2 font-monospace text-wrap ${isFailed ? 'text-danger' : 'text-success'}" style="font-size:12px;">${h.query_text}</pre>
                    </td>
                </tr>
            `;
        });
        body.innerHTML = historyHtml;
    } catch(e) { 
        console.error(e);
        body.innerHTML = '<tr><td colspan="9" class="text-danger p-4 text-center fw-bold">History load error.</td></tr>';
    }
}

function exportHistoryToCSV() {
    const dataRows = window.cachedHistoryMetadata;
    if (!dataRows || dataRows.length === 0) {
        alert("No query logs available to export.");
        return;
    }

    const headers = ["ID", "Student Name", "SQL Statement", "Status", "Duration", "Rows Affected", "Executed At", "Notes (Latest)", "Note Versions"];
    const csvContent = [
        headers.join(','),
        ...dataRows.map(r => [
            r.id,
            `"${(r.student_name || 'Anonymous').replace(/"/g, '""')}"`,
            `"${(r.query_text || '').replace(/"/g, '""').replace(/\r?\n/g, ' ')}"`,
            r.status,
            r.duration,
            r.row_count,
            r.started_at,
            `"${(r.latest_note || '').replace(/"/g, '""').replace(/\r?\n/g, ' ')}"`,
            r.note_count || 0
        ].join(','))
    ].join('\n');

    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = `SQL_Lab_Filtered_History_${new Date().toISOString().slice(0,10)}.csv`;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}


        /**
         * Restore query logic to active Terminal
         */
        function loadSQLToEditor(base64Sql) {
            editor.setValue(decodeURIComponent(escape(atob(base64Sql))));
            bootstrap.Tab.getInstance(document.getElementById('results-tab')).show();
            editor.focus();
        }

        function escapeHtml(str) {
            const div = document.createElement('div');
            div.textContent = str;
            return div.innerHTML;
        }

        async function saveQueryNote(queryHistoryId, inputEl) {
            const noteText = inputEl.value.trim();
            if (!noteText) return;
            try {
                await fetchAPI('add_query_note', { query_history_id: queryHistoryId, note_text: noteText, student_name: activeStudentName });
                inputEl.value = '';
                fetchSharedHistory();
            } catch (e) {
                alert('Failed to save note: ' + e.message);
            }
        }

        async function loadNoteHistory(queryHistoryId, collapseId, btnEl) {
            const container = document.getElementById(collapseId).querySelector('.notes-history-body');
            if (btnEl.dataset.loaded === 'true') return;
            try {
                const data = await fetchAPI('get_query_notes', { query_history_id: queryHistoryId });
                const notes = data.notes || [];
                container.innerHTML = notes.map(n => {
                    const when = n.created_at ? new Date(n.created_at.trim().replace(" ", "T") + "Z").toLocaleString('en-IN', { timeZone: 'Asia/Kolkata', hour12: true, day: '2-digit', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit' }) : '';
                    return `<div class="mb-1"><span class="fw-bold text-info">${escapeHtml(n.student_name || 'Anonymous')}</span> <span class="text-white-50">(${when})</span>: ${escapeHtml(n.note_text)}</div>`;
                }).join('') || '<div class="text-white-50">No notes found.</div>';
                btnEl.dataset.loaded = 'true';
            } catch (e) {
                container.innerHTML = `<div class="text-danger">Failed to load notes history.</div>`;
            }
        }

        // --- ASSESSMENT ENGINE (EXTENDED DATASETS) ---

        let quizState = { currentSet: null, currentQuestionIndex: 0, score: 0, timer: 0, timerId: null };
        const quizzes = [
            { 
                name: "MySQL Logic & Set Theory", 
                questions: [ 
                    { q: "Evaluate: Select all records from 'Students' where grade is 'A'.", o: ["SELECT * FROM Students WHERE grade = 'A'", "GET Students SET grade = 'A'", "FILTER Students BY grade 'A'"], a: 0 },
                    { q: "Keyword to eliminate duplicates in a projection?", o: ["UNIQUE", "DISTINCT", "REMOVE_DUPLICATES"], a: 1 },
                    { q: "Temporarily rename a result set column.", o: ["ALIAS", "AS", "SET"], a: 1 },
                    { q: "Evaluation of pattern matches with wildcards.", o: ["LIKE", "MATCH", "CONTAINS"], a: 0 }
                ] 
            },
            { 
                name: "Aggregation & Optimization", 
                questions: [ 
                    { q: "Function to calculate arithmetic mean.", o: ["AVERAGE()", "AVG()", "MEAN()"], a: 1 },
                    { q: "HAVING clause context application stage?", o: ["Pre-Grouping", "Post-Grouping", "Initial Selection"], a: 1 },
                    { q: "Result of RANK() on tied values?", o: ["Consecutive values", "Gaps in rank numbering", "Duplicates assigned"], a: 0 },
                    { q: "Best practice for projecting large tables?", o: ["SELECT *", "SELECT [specific_columns]", "SELECT ALL"], a: 1 }
                ] 
            },
            {
                name: "Joins & Normalization",
                questions: [
                    { q: "Join type returning all rows from first table regardless of match?", o: ["INNER JOIN", "LEFT JOIN", "FULL JOIN"], a: 1 },
                    { q: "Process of reducing data redundancy?", o: ["Normalization", "Indexing", "Compression"], a: 0 },
                    { q: "Primary function of a Foreign Key?", o: ["Sort table", "Enforce referential integrity", "Increase write speed"], a: 1 }
                ]
            }
        ];

        function renderQuizHome() {
            if (quizState.timerId) clearInterval(quizState.timerId);
            const panel = document.getElementById('quiz-panel');
            panel.innerHTML = `
                <div id="quiz-selection-area">
                    <p class="text-white-50 x-small mb-4 border-bottom border-secondary border-opacity-10 pb-2 italic">Select a core competency module to begin evaluation.</p>
                    <div id="quiz-set-buttons" class="d-grid gap-2"></div>
                </div>
                <div id="quiz-main-area" class="d-none">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div id="quiz-timer" class="fw-bold text-warning font-monospace small bg-black bg-opacity-25 px-2 rounded"></div>
                        <div id="quiz-score-badge" class="badge bg-secondary font-monospace">PTS: 0</div>
                    </div>
                    <div id="quiz-question" class="small mb-4 border-start border-info border-3 ps-3 italic lh-sm text-info"></div>
                    <div id="quiz-options" class="d-grid gap-2"></div>
                    <div id="quiz-summary" class="text-center d-none mt-3"></div>
                </div>
            `;

            const quizSetButtons = document.getElementById('quiz-set-buttons');
            quizSetButtons.innerHTML = quizzes.map((quiz, index) => `
                <button class="btn btn-outline-info btn-sm text-start py-2 px-3 rounded-3" onclick="startQuiz(${index})">
                    <i class="bi bi-arrow-right-circle me-2 opacity-50"></i> ${quiz.name}
                </button>
            `).join('');
        }

        function startQuiz(setIndex) {
            quizState = { 
                currentSet: quizzes[setIndex], 
                currentQuestionIndex: 0, 
                score: 0, 
                timer: 120, 
                timerId: setInterval(updateQuizTimer, 1000) 
            };
            document.getElementById('quiz-selection-area').classList.add('d-none');
            document.getElementById('quiz-main-area').classList.remove('d-none');
            renderQuestion();
        }

        function updateQuizTimer() {
            const timerEl = document.getElementById('quiz-timer');
            if (!timerEl) return;
            const minutes = Math.floor(quizState.timer / 60);
            const seconds = quizState.timer % 60;
            timerEl.innerHTML = `<i class="bi bi-stopwatch me-1"></i> ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            if (quizState.timer > 0) quizState.timer--;
            else showQuizSummary(true);
        }

        function renderQuestion() {
            const q = quizState.currentSet.questions[quizState.currentQuestionIndex];
            document.getElementById('quiz-question').innerText = q.q;
            document.getElementById('quiz-options').innerHTML = q.o.map((option, index) => `
                <button class="btn btn-sm btn-outline-secondary text-start py-2 quiz-option border-secondary border-opacity-25 rounded-3" onclick="selectAnswer(${index}, this)">
                    ${option}
                </button>
            `).join('');
        }

        function selectAnswer(selectedIndex, buttonElement) {
            const isCorrect = selectedIndex === quizState.currentSet.questions[quizState.currentQuestionIndex].a;
            buttonElement.classList.add(isCorrect ? 'bg-success' : 'bg-danger', 'text-white', 'border-0', 'shadow-lg');
            if (isCorrect) {
                quizState.score++;
                document.getElementById('quiz-score-badge').innerText = `PTS: ${quizState.score}`;
            }
            
            Array.from(document.getElementById('quiz-options').children).forEach(btn => btn.disabled = true);
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
            
            summaryEl.innerHTML = `
                <h6 class="text-info text-uppercase fw-bold mb-3">${timesUp ? "Cycle Timeout" : "Phase Optimized"}</h6>
                <div class="display-5 fw-bold mb-4 font-monospace">${quizState.score}/${quizState.currentSet.questions.length}</div>
                <button class="btn btn-primary btn-sm px-5 rounded-pill shadow fw-bold" onclick="renderQuizHome()">REBOOT MODULE</button>
            `;
        }

        // --- UI REFINEMENTS ---

        function displayResults(headers, data, executionTime) {
            if (data.length === 0) {
                displayMessage('info', 'Command executed successfully. Target set returned 0 records.');
                return;
            }

            document.getElementById('msg-area').classList.add('d-none');
            document.getElementById('results-table-container').classList.remove('d-none');
            document.getElementById('download-csv-btn').classList.remove('d-none');
            document.getElementById('viz-tab').disabled = false;

            document.getElementById('results-header').innerHTML = `<tr>${headers.map(h => `<th>${h}</th>`).join('')}</tr>`;
            document.getElementById('results-body').innerHTML = data.map(row => `
                <tr>${headers.map(h => `<td>${row[h] ?? '<span class="text-white-50 x-small italic">NULL</span>'}</td>`).join('')}</tr>
            `).join('');

            populateVisualizationControls(headers, data);
        }

        function displayMessage(type, text) {
            const area = document.getElementById('msg-area');
            area.classList.remove('d-none', 'alert-secondary', 'alert-danger', 'alert-info');
            area.className = `alert alert-${type === 'error' ? 'danger' : 'info'} small py-4 px-4 border-0 shadow-lg rounded-4`;
            area.innerHTML = `<div class="d-flex gap-4 align-items-center">
                                <i class="bi ${type === 'error' ? 'bi-bug-fill text-danger' : 'bi-info-circle-fill text-info'} fs-2"></i> 
                                <div><b class="text-uppercase tracking-wider">Engine ${type === 'error' ? 'Exception' : 'Notification'}</b><br><span class="opacity-75">${text}</span></div>
                             </div>`;
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
            if (queryHistory.length === 0) {
                container.innerHTML = '<div class="p-4 text-center small text-white-50 italic">Session log is empty.</div>';
                return;
            }
            container.innerHTML = queryHistory.map(q => `
                <button class="list-group-item list-group-item-action py-3 small text-truncate font-monospace border-0 border-bottom border-secondary border-opacity-10 bg-transparent" 
                        onclick="editor.setValue(\`${q}\`); editor.focus();">
                    <i class="bi bi-chevron-right me-2 text-info opacity-50"></i>${q}
                </button>
            `).join('');
        }

/**
         * Upgraded Controls populator supporting PowerBI-style visual sets
         */
        function populateVisualizationControls(headers, data) {
            const labelSelect = document.getElementById('label-col-select');
            const dataSelect = document.getElementById('data-col-select');
            const typeSelect = document.getElementById('chart-type-select');
            
            labelSelect.innerHTML = headers.map(h => `<option value="${h}">${h}</option>`).join('');
            
            // Auto-filter number attributes for numerical metrics projection logic
            dataSelect.innerHTML = headers.filter(h => {
                const val = data[0]?.[h];
                return val !== null && !isNaN(parseFloat(val)) && isFinite(val);
            }).map(h => `<option value="${h}">${h}</option>`).join('');
            
            typeSelect.innerHTML = [
                {v: 'bar', n: 'Column / Bar Chart'},
                {v: 'line', n: 'Line / Trend Analysis'},
                {v: 'area', n: 'Area Continuous Chart'},
                {v: 'pie', n: 'Pie Proportional Shares'},
                {v: 'doughnut', n: 'Donut Composite Chart'},
                {v: 'radar', n: 'Radar Polar Metrics'}
            ].map(t => `<option value="${t.v}">${t.n}</option>`).join('');
            
            if (dataSelect.options.length > 0) dataSelect.options[0].selected = true;
            
            // Clean dynamic structures
            document.getElementById('bi-kpi-strip').classList.add('d-none');
            if (resultsChart) { resultsChart.destroy(); resultsChart = null; }
        }

        /**
         * Central Processing Aggregation Engine
         * Transforms flat queries into aggregated semantic models inside the client runtime context
         */
        function processSemanticModel(rawData, dimensionKey, metricsKeys, aggregationType) {
            if (aggregationType === 'NONE') {
                return {
                    labels: rawData.map(r => String(r[dimensionKey] ?? 'NULL')),
                    datasets: metricsKeys.map(mKey => ({
                        label: mKey,
                        data: rawData.map(r => parseFloat(r[mKey] ?? 0))
                    }))
                };
            }

            // Grouping phase mapping
            const groups = {};
            rawData.forEach(row => {
                const groupVal = String(row[dimensionKey] ?? 'NULL');
                if (!groups[groupVal]) {
                    groups[groupVal] = [];
                }
                groups[groupVal].push(row);
            });

            const uniqueLabels = Object.keys(groups);
            const processedDatasets = metricsKeys.map(mKey => {
                const aggregatedValues = uniqueLabels.map(label => {
                    const records = groups[label];
                    const numbers = records.map(r => parseFloat(r[mKey] ?? 0)).filter(v => !isNaN(v));
                    
                    if (numbers.length === 0) return 0;

                    switch (aggregationType) {
                        case 'SUM':
                            return numbers.reduce((a, b) => a + b, 0);
                        case 'AVG':
                            return numbers.reduce((a, b) => a + b, 0) / numbers.length;
                        case 'COUNT':
                            return numbers.length;
                        case 'MIN':
                            return Math.min(...numbers);
                        case 'MAX':
                            return Math.max(...numbers);
                        default:
                            return 0;
                    }
                });

                return {
                    label: `${mKey} (${aggregationType})`,
                    data: aggregatedValues
                };
            });

            return { labels: uniqueLabels, datasets: processedDatasets };
        }

        /**
         * Renders Dynamic KPI Blocks above Dashboard Viewports
         */
        function generateBIMetricsSummaryCards(labels, datasets) {
            const kpiStrip = document.getElementById('bi-kpi-strip');
            if (!kpiStrip) return;

            kpiStrip.innerHTML = '';
            kpiStrip.classList.remove('d-none');

            // Card 1: Dimension Domain Scope Lookups
            const dimCard = document.createElement('div');
            dimCard.className = 'col-md-4';
            dimCard.innerHTML = `
                <div class="p-3 rounded-3 border border-secondary border-opacity-10 font-monospace" style="background-color: rgba(122, 162, 247, 0.04); border-left: 3px solid var(--tokyo-accent) !important;">
                    <div class="text-white-50" style="font-size: 10px;">UNIQUE DIMENSION ELEMENTS</div>
                    <div class="fs-4 fw-bold text-white mt-1">${labels.length} <span class="small text-white-50" style="font-size: 12px;">Groups</span></div>
                </div>
            `;
            kpiStrip.appendChild(dimCard);

            // Generate contextual aggregate totals over metric series sets
            datasets.slice(0, 2).forEach((ds, idx) => {
                const totalSum = ds.data.reduce((a, b) => a + b, 0);
                const meanVal = totalSum / (ds.data.length || 1);
                
                const metricCard = document.createElement('div');
                metricCard.className = 'col-md-4';
                metricCard.innerHTML = `
                    <div class="p-3 rounded-3 border border-secondary border-opacity-10 font-monospace" style="background-color: rgba(158, 206, 106, 0.04); border-left: 3px solid var(--tokyo-success) !important;">
                        <div class="text-white-50 text-truncate" style="font-size: 10px; max-width: 240px;">AGGREGATE RECORD VALUES [${ds.label}]</div>
                        <div class="fs-4 fw-bold text-white mt-1">${Number(totalSum.toFixed(2)).toLocaleString()} <span class="small text-white-50" style="font-size: 11px;">(Avg: ${Number(meanVal.toFixed(1)).toLocaleString()})</span></div>
                    </div>
                `;
                kpiStrip.appendChild(metricCard);
            });
        }

        /**
         * Main Execution Blueprint: PowerBI Render Process Core Engine
         */
        document.getElementById('update-chart-btn').onclick = () => {
            if (resultsChart) {
                resultsChart.destroy();
                resultsChart = null;
            }

            const rawVisualType = document.getElementById('chart-type-select').value;
            const labelCol = document.getElementById('label-col-select').value;
            const aggregationMode = document.getElementById('chart-agg-select').value;
            const dataCols = Array.from(document.getElementById('data-col-select').selectedOptions).map(o => o.value);
            
            const configGridlines = document.getElementById('chart-toggle-grid').checked;
            const configStacked = document.getElementById('chart-toggle-stacked').checked;
            const activeThemeMode = document.documentElement.getAttribute('data-bs-theme') || 'dark';

            if (!labelCol || dataCols.length === 0) return;

            // Generate unified aggregated data framework model arrays
            const model = processSemanticModel(currentResults.data, labelCol, dataCols, aggregationMode);
            
            // Build Context KPI elements cards arrays dynamically
            generateBIMetricsSummaryCards(model.labels, model.datasets);

            // Polyfill Area configurations parameters mapping
            const chartJsType = rawVisualType === 'area' ? 'line' : rawVisualType;
            
            const configuredDatasets = model.datasets.map((dataset, idx) => {
                const hueValue = (idx * (360 / Math.max(dataCols.length, 1))) % 360;
                const baseBackground = `hsla(${hueValue}, 75%, 60%, 0.65)`;
                const baseBorder = `hsla(${hueValue}, 80%, 55%, 1)`;

                return {
                    ...dataset,
                    backgroundColor: (rawVisualType === 'pie' || rawVisualType === 'doughnut') 
                        ? model.labels.map((_, lIdx) => `hsla(${(lIdx * (360 / model.labels.length)) % 360}, 70%, 60%, 0.75)`)
                        : baseBackground,
                    borderColor: (rawVisualType === 'pie' || rawVisualType === 'doughnut')
                        ? model.labels.map((_, lIdx) => `hsla(${(lIdx * (360 / model.labels.length)) % 360}, 75%, 50%, 1)`)
                        : baseBorder,
                    borderWidth: 2,
                    fill: rawVisualType === 'area', // Handle custom area visualization fill trigger
                    tension: rawVisualType === 'line' || rawVisualType === 'area' ? 0.3 : 0,
                    borderRadius: rawVisualType === 'bar' ? 4 : 0,
                    stack: configStacked ? 'combined_stack' : undefined
                };
            });

            // Theme font color configuration resolution overrides
            const fontColorToken = activeThemeMode === 'light' ? '#334155' : '#a9b1d6';
            const gridColorToken = activeThemeMode === 'light' ? 'rgba(0, 0, 0, 0.05)' : 'rgba(255, 255, 255, 0.05)';

            resultsChart = new Chart(document.getElementById('results-chart'), {
                type: chartJsType,
                data: {
                    labels: model.labels,
                    datasets: configuredDatasets
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: rawVisualType === 'pie' || rawVisualType === 'doughnut' ? 'right' : 'top',
                            labels: { color: fontColorToken, font: { family: 'Roboto Mono', size: 11 } }
                        },
                        tooltip: {
                            backgroundColor: activeThemeMode === 'light' ? '#ffffff' : '#1f2335',
                            titleColor: activeThemeMode === 'light' ? '#0f172a' : '#7aa2f7',
                            bodyColor: activeThemeMode === 'light' ? '#334155' : '#c0caf5',
                            borderColor: activeThemeMode === 'light' ? '#cbd5e1' : '#414868',
                            borderWidth: 1,
                            padding: 12
                        }
                    },
                    scales: (rawVisualType !== 'pie' && rawVisualType !== 'doughnut' && rawVisualType !== 'radar') ? {
                        y: {
                            stacked: configStacked,
                            grid: { color: gridColorToken, display: configGridlines },
                            ticks: { color: fontColorToken, font: { family: 'Roboto Mono' } }
                        },
                        x: {
                            stacked: configStacked,
                            grid: { color: gridColorToken, display: configGridlines },
                            ticks: { color: fontColorToken, font: { family: 'Roboto Mono' } }
                        }
                    } : {}
                }
            });
        };

        document.getElementById('update-chart-btn').onclick = () => {
            if (resultsChart) resultsChart.destroy();
            const type = document.getElementById('chart-type-select').value;
            const labelCol = document.getElementById('label-col-select').value;
            const dataCols = Array.from(document.getElementById('data-col-select').selectedOptions).map(o => o.value);
            
            if (!labelCol || dataCols.length === 0) return;

            resultsChart = new Chart(document.getElementById('results-chart'), {
                type: type,
                data: {
                    labels: currentResults.data.map(r => r[labelCol]),
                    datasets: dataCols.map((col, i) => ({
                        label: col,
                        data: currentResults.data.map(r => parseFloat(r[col])),
                        backgroundColor: `hsla(${i * 85}, 70%, 55%, 0.6)`,
                        borderColor: `hsla(${i * 85}, 70%, 55%, 1)`,
                        borderWidth: 2,
                        borderRadius: 4
                    }))
                },
                options: { 
                    responsive: true, 
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { labels: { color: document.documentElement.getAttribute('data-bs-theme') === 'light' ? '#334155' : '#a9b1d6', font: { family: 'Inter', size: 11, weight: '600' } } }
                    },
                    scales: type !== 'pie' && type !== 'radar' ? {
                        y: { grid: { color: 'rgba(255,255,255,0.05)' }, ticks: { color: '#565f89' } },
                        x: { grid: { display: false }, ticks: { color: '#565f89' } }
                    } : {}
                }
            });
        };

        document.getElementById('run-query-btn').onclick = (e) => { e.preventDefault(); executeQuery(); };
        
        document.getElementById('clear-history-btn').onclick = () => { 
            queryHistory = []; 
            localStorage.removeItem('sqlLabHistory'); 
            renderHistory(); 
        };

        document.getElementById('download-csv-btn').onclick = () => {
            const headers = currentResults.headers;
            const data = currentResults.data;
            const csv = [headers.join(','), ...data.map(r => headers.map(h => `"${(r[h]??'').toString().replace(/"/g,'""')}"`).join(','))].join('\n');
            const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `query_results_${new Date().getTime()}.csv`;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        };

        document.getElementById('generate-ai-query-btn').onclick = async () => {
            const prompt = document.getElementById('ai-prompt').value.trim();
            const loader = document.getElementById('ai-btn-loader');
            const text = document.getElementById('ai-btn-text');
            const err = document.getElementById('ai-error');
            
            if(!prompt) return;
            err.classList.add('d-none');
            text.classList.add('d-none');
            loader.classList.remove('d-none');

            try {
                const res = await fetchAPI('generate_sql', { prompt });
                editor.setValue(res.sql);
                bootstrap.Modal.getInstance(document.getElementById('aiAssistModal')).hide();
            } catch(e) { 
                err.innerText = e.message;
                err.classList.remove('d-none');
            } finally {
                text.classList.remove('d-none');
                loader.classList.add('d-none');
            }
        };
        
        
        
// --- CENTRALIZED MULTI-TENANT DATABASE SYSTEM CONFIGURATION ---
let serverCustomDBs = []; // Populated asynchronously from the centralized backend table
let currentSessionPassword = '';

/**
 * Asynchronously fetches all registered database environments from the backend 
 * and populates both the navbar selector and onboarding dropdowns.
 */
async function rebuildDBDropdowns() {
    try {
        const baseUrl = window.location.origin + window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/') + 1);
        const res = await fetch(`${baseUrl}api.php?action=get_registered_dbs`, { 
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({}) // Sends an empty object instead of a blank payload
});
        const result = await res.json();
        
        serverCustomDBs = result.custom_databases || [];
    } catch(err) {
        console.warn("Unable to sync database catalog from the central directory server.", err);
    }

    const mainSelect = document.getElementById('db-mode-select');
    const onboardingSelect = document.getElementById('onboarding-db-selector');
    
    let baseOptions = `
        <option value="ro">Read-Only (Main DB)</option>
        <option value="rw">Read-Write (Sandbox)</option>
    `;
    
    let onboardingOptions = `
        <option value="ro">System Read-Only Database</option>
        <option value="rw">System Read-Write Database</option>
    `;

    // Map all globally registered profiles to dropdowns for all users
    serverCustomDBs.forEach(dbName => {
        baseOptions += `<option value="custom_${dbName}">DB: ${dbName}</option>`;
        onboardingOptions += `<option value="custom_${dbName}">Database Workspace: ${dbName}</option>`;
    });
    
    onboardingOptions += `<option value="custom_new">+ Register External Database...</option>`;
    
    if (mainSelect) mainSelect.innerHTML = baseOptions;
    if (onboardingSelect) onboardingSelect.innerHTML = onboardingOptions;
}


// Handles switching databases directly from the main navbar select element
const mainModeSelector = document.getElementById('db-mode-select');
if (mainModeSelector) {
    mainModeSelector.addEventListener('change', function(e) {
        const selectedMode = e.target.value;
        if (selectedMode.startsWith('custom_')) {
            // Re-open the security gateway to ask for the password to this database
            const targetDbName = selectedMode.replace('custom_', '');
            openDatabaseRegistrationGate(targetDbName);
        } else {
            dbMode = selectedMode;
            currentSessionPassword = ''; // Flush passwords for default paths
            fetchTables();
        }
    });
}

// Dynamic listener tracking dropdown selection swaps inside the login modal workspace
document.getElementById('onboarding-db-selector').addEventListener('change', function(e) {
    const selectedValue = e.target.value;
    const fieldsBlock = document.getElementById('custom-db-fields');
    const passwordBlock = document.getElementById('gateway-password-block');
    const passLabel = document.getElementById('pass-gateway-label');
    
    // Check if the current choice is a custom database profile setup 
    const isCustomDb = selectedValue === 'custom_new' || selectedValue.startsWith('custom_');

    if (selectedValue === 'custom_new') {
        fieldsBlock.classList.remove('d-none');
        passwordBlock.classList.remove('d-none');
        passLabel.innerHTML = '3. Create/Set Storage Password for this Workspace <span class="text-danger">*</span>';
    } else if (selectedValue.startsWith('custom_')) {
        fieldsBlock.classList.add('d-none');
        passwordBlock.classList.remove('d-none');
        const targetDbName = selectedValue.replace('custom_', '');
        passLabel.innerHTML = `Enter Access Password for "${targetDbName}" <span class="text-danger">*</span>`;
    } else {
        // System defaults (ro/rw) hide password element blocks completely
        fieldsBlock.classList.add('d-none');
        passwordBlock.classList.add('d-none');
        document.getElementById('onboarding-input-pass').value = ''; 
    }
});

// Primary Submission validation gateway logic
// document.getElementById('submit-onboarding-btn').onclick = async () => {
//     const nameInput = document.getElementById('onboarding-input-name').value.trim();
//     const dbChoice = document.getElementById('onboarding-db-selector').value;
//     const passwordInput = document.getElementById('onboarding-input-pass').value.trim();
//     const errorBanner = document.getElementById('onboarding-error-area');
    
//     // Rule 1: Student tracking user name is absolutely mandatory for all profiles
//     if (!nameInput) {
//         errorBanner.innerText = "Student identity tracking name is strictly required.";
//         errorBanner.classList.remove('d-none');
//         return;
//     }

//     // Rule 2: Enforce password parameters purely on external custom workspaces
//     const isCustomDb = dbChoice === 'custom_new' || dbChoice.startsWith('custom_');
//     if (isCustomDb && !passwordInput) {
//         errorBanner.innerText = "Access validation token/password is mandatory for custom workspaces.";
//         errorBanner.classList.remove('d-none');
//         return;
//     }

//     sessionStorage.setItem('sqlLabUsername', nameInput);
//     applyVerifiedStudentIdentity(nameInput);
//     currentSessionPassword = passwordInput;

//     try {
//         errorBanner.classList.add('d-none');

//         if (dbChoice === 'custom_new') {
//             const host = document.getElementById('custom-db-host').value.trim();
//             const dbName = document.getElementById('custom-db-name').value.trim();
//             const dbUser = document.getElementById('custom-db-user').value.trim();

//             if (!host || !dbName || !dbUser) {
//                 errorBanner.innerText = "Please complete all target host deployment parameters.";
//                 errorBanner.classList.remove('d-none');
//                 return;
//             }

//             const baseUrl = window.location.origin + window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/') + 1);
//             const registerCall = await fetch(`${baseUrl}api.php?action=register_new_db`, {
//                 method: 'POST',
//                 headers: { 'Content-Type': 'application/json' },
//                 body: JSON.stringify({ student_name: nameInput, host, name: dbName, user: dbUser, pass: passwordInput })
//             });
            
//             const registerRes = await registerCall.json();
//             if (!registerCall.ok || registerRes.error) {
//                 throw new Error(registerRes.error || "Master ledger catalog validation error.");
//             }
            
//             dbMode = `custom_${dbName}`;
//         } else {
//             dbMode = dbChoice;
//         }

//         await fetchTables();
//         await rebuildDBDropdowns();
//         document.getElementById('db-mode-select').value = dbMode;
//         bootstrap.Modal.getInstance(document.getElementById('studentRegistrationModal')).hide();
//     } catch(err) {
//         errorBanner.innerText = `Workspace Login Rejected: ${err.message}`;
//         errorBanner.classList.remove('d-none');
//         document.getElementById('db-mode-select').value = dbMode;
//     }
// };

/**
 * Syncs the form parameters layout state cleanly whenever the modal UI framework opens manually
 */
function openDatabaseRegistrationGate(preSelectedDbName = null) {
    const modalElement = document.getElementById('studentRegistrationModal');
    if (!modalElement) return;

    const currentStudent = sessionStorage.getItem('sqlLabUsername') || '';
    if (currentStudent) {
        document.getElementById('onboarding-input-name').value = currentStudent;
    }

    const dbSelector = document.getElementById('onboarding-db-selector');
    const customFieldsBlock = document.getElementById('custom-db-fields');
    const passwordBlock = document.getElementById('gateway-password-block');
    const passLabel = document.getElementById('pass-gateway-label');

    if (preSelectedDbName) {
        dbSelector.value = `custom_${preSelectedDbName}`;
        customFieldsBlock.classList.add('d-none');
        passwordBlock.classList.remove('d-none');
        passLabel.innerHTML = `Enter Access Password for "${preSelectedDbName}" <span class="text-danger">*</span>`;
    } else {
        dbSelector.value = 'custom_new';
        customFieldsBlock.classList.remove('d-none');
        passwordBlock.classList.remove('d-none');
        passLabel.innerHTML = '3. Create/Set Storage Password for this Workspace <span class="text-danger">*</span>';
    }

    bootstrap.Modal.getOrCreateInstance(modalElement).show();
}

/**
 * Core Network Interface Interceptor Override
 * Intercepts query calls to forward verification passwords smoothly to api.php
 */
async function fetchAPI(action, body) {
    try {
        const payload = { 
            ...body, 
            db_mode: dbMode,
            db_pass: currentSessionPassword
        };
        
        const baseUrl = window.location.origin + window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/') + 1);
        const targetUrl = `${baseUrl}${API_ENDPOINT}?action=${encodeURIComponent(action)}`;
        
        const response = await fetch(targetUrl, { 
            method: 'POST', 
            headers: { 'Content-Type': 'application/json' }, 
            body: JSON.stringify(payload) 
        });
        
        const result = await response.json().catch(() => ({}));
        if (!response.ok && result.success !== false) throw new Error(result.error || `Server Error ${response.status}`);
        return result;
    } catch (error) { 
        console.error(`[CRITICAL] API [${action}] failed:`, error);
        throw error; 
    }
}


    </script>
</body>
</html>