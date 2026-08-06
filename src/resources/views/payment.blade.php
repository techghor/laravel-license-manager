<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>License Expired</title>
    
    <!-- Google Fonts & Tailwind CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- FontAwesome & DataTables CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <style>
        body { font-family: 'Inter', sans-serif; }

        /* Compact DataTables Overrides */
        .dataTables_wrapper { padding: 0.5rem 0; }
        .dataTables_wrapper .dataTables_length, 
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 0.75rem;
            font-size: 0.8125rem;
            color: #475569;
        }
        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #cbd5e1;
            border-radius: 0.375rem;
            padding: 0.25rem 0.5rem;
            outline: none;
            margin-left: 0.5rem;
            font-size: 0.8125rem;
        }
        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.15);
        }
        .dataTables_wrapper .dataTables_length select {
            border: 1px solid #cbd5e1;
            border-radius: 0.375rem;
            padding: 0.25rem 1.5rem 0.25rem 0.5rem;
            font-size: 0.8125rem;
        }
        table.dataTable thead th {
            background-color: #f8fafc;
            color: #475569;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 0.625rem 0.75rem !important;
            border-bottom: 1px solid #e2e8f0 !important;
        }
        table.dataTable tbody td {
            padding: 0.5rem 0.75rem !important;
            font-size: 0.8125rem;
            color: #1e293b;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
        }
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_paginate {
            font-size: 0.8125rem;
            margin-top: 0.75rem;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #4f46e5 !important;
            color: #ffffff !important;
            border: none;
            border-radius: 0.375rem;
            padding: 0.25rem 0.625rem;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #e0e7ff !important;
            color: #3730a3 !important;
            border: none;
            border-radius: 0.375rem;
        }

        /* Modernized Bootstrap Fallback Styles for Dynamic API HTML */
        #lead-table .badge {
            display: inline-flex;
            align-items: center;
            padding: 0.2rem 0.5rem;
            font-size: 0.7rem;
            font-weight: 600;
            border-radius: 9999px;
            line-height: 1;
        }
        #lead-table .bg-danger, #lead-table .badge-danger {
            background-color: #ffe4e6 !important;
            color: #9f1239 !important;
        }
        #lead-table .bg-success, #lead-table .badge-success {
            background-color: #dcfce7 !important;
            color: #166534 !important;
        }
        #lead-table .bg-warning, #lead-table .badge-warning {
            background-color: #fef3c7 !important;
            color: #92400e !important;
        }
        #lead-table .btn-xs {
            padding: 0.3rem 0.625rem;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 0.375rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.25rem;
            text-decoration: none !important;
            transition: all 0.15s ease-in-out;
            border: none;
            line-height: 1.25;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }
        #lead-table .btn-primary {
            background-color: #4f46e5 !important;
            color: #ffffff !important;
        }
        #lead-table .btn-primary:hover {
            background-color: #4338ca !important;
        }
        #lead-table .btn-warning {
            background-color: #f59e0b !important;
            color: #ffffff !important;
        }
        #lead-table .btn-warning:hover {
            background-color: #d97706 !important;
        }
    </style>
</head>
<body class="min-h-screen py-6 px-4 sm:px-6 lg:px-8 bg-slate-50 text-slate-800">

    <div class="max-w-6xl mx-auto space-y-4">

        <!-- Banner Alert -->
        <div class="bg-rose-50 border-l-4 border-rose-500 rounded-xl p-4 shadow-sm flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-rose-100 text-rose-600 rounded-lg flex-shrink-0">
                    <i class="fa-solid fa-triangle-exclamation text-lg"></i>
                </div>
                <div>
                    <h1 class="text-base font-bold text-rose-900">License Expired</h1>
                    <p class="text-xs text-rose-700">Please clear your outstanding balance to restore software access.</p>
                </div>
            </div>
            <span class="px-3 py-1 bg-rose-100 text-rose-800 text-xs font-bold rounded-lg border border-rose-200 uppercase tracking-wider whitespace-nowrap">
                License Manager
            </span>
        </div>

        <!-- KPI Strip -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
            <!-- Total Due -->
            <div class="bg-white p-3.5 rounded-xl shadow-sm border border-slate-200/80 flex items-center justify-between">
                <div>
                    <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Total Due</p>
                    <h3 class="text-xl font-bold text-rose-600 mt-0.5">{{ $currencySymbol . $dueAmount }}</h3>
                </div>
                <div class="p-2.5 bg-rose-50 text-rose-500 rounded-lg">
                    <i class="fa-solid fa-receipt text-lg"></i>
                </div>
            </div>

            <!-- Status -->
            <div class="bg-white p-3.5 rounded-xl shadow-sm border border-slate-200/80 flex items-center justify-between">
                <div>
                    <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">License Status</p>
                    <span class="inline-flex items-center px-2 py-0.5 mt-1 rounded-md text-xs font-semibold bg-rose-100 text-rose-800">
                        Expired
                    </span>
                </div>
                <div class="p-2.5 bg-amber-50 text-amber-500 rounded-lg">
                    <i class="fa-solid fa-ban text-lg"></i>
                </div>
            </div>

            <!-- License Key -->
            <div class="bg-white p-3.5 rounded-xl shadow-sm border border-slate-200/80 flex items-center justify-between">
                <div class="overflow-hidden">
                    <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">License Key</p>
                    <p class="text-xs font-mono font-bold text-slate-700 mt-1 bg-slate-100 px-2 py-0.5 rounded border border-slate-200 truncate">
                        {{ $encryptedLicenseKey ?? 'N/A' }}
                    </p>
                </div>
                <div class="p-2.5 bg-indigo-50 text-indigo-500 rounded-lg flex-shrink-0 ml-2">
                    <i class="fa-solid fa-key text-lg"></i>
                </div>
            </div>
        </div>

        <!-- Invoices Table Section -->
        <div id="invoices-section" class="bg-white p-4 rounded-xl shadow-sm border border-slate-200/80 space-y-3">
            <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                <div>
                    <h2 class="text-sm font-bold text-slate-800">Invoices & Payment History</h2>
                    <p class="text-xs text-slate-400">Review your past transactions and pending bills</p>
                </div>
                <button onclick="location.reload()" class="px-3 py-1 bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-medium rounded-lg transition flex items-center gap-1.5">
                    <i class="fa-solid fa-rotate-right text-xs"></i> Refresh
                </button>
            </div>

            <!-- Table Wrapper -->
            <div class="overflow-x-auto">
                <table id="lead-table" class="w-full text-left border-collapse" cellspacing="0" width="100%">
                    <!-- DataTables AJAX content -->
                </table>
            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var invoiceApiUrl = "{{ $invoiceApi . '/' . $decryptedLicenseKey }}";
            
            $("#lead-table").DataTable({
                "processing": true,
                "responsive": true,
                "ajax": invoiceApiUrl,
                columns: [
                    { data: 8, title: "Pay Action", className: "text-center" }, // Pay Link placed as 1st Column
                    { data: 0, title: "Invoice No" },
                    { data: 1, title: "Institute" },
                    { data: 2, title: "Bill Date" },
                    { data: 3, title: "Due Date" },
                    { data: 4, title: "Bill Amount" },
                    { data: 5, title: "Paid Amount" },
                    { data: 6, title: "Status" },
                    { data: 7, title: "PDF", className: "text-center" }
                ],
                order: [[4, 'desc']], // Sorted by Due Date (column index 4)
                lengthMenu: [[10, 25, 50, -1], ['10', '25', '50', 'All']]
            });
        });
    </script>
</body>
</html>