<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>License Expired</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 0; padding: 20px; text-align: center; }
        .container { max-width: 800px; margin: 0 auto; }
        h1 { color: red; }
        p { font-size: 18px; }
        .table-responsive { margin-top: 20px; }
        .table-xs { width: 100%; margin-bottom: 1rem; background-color: transparent; border-collapse: collapse; text-align: left; font-size: 0.75rem; }
        .table-xs th, .table-xs td { padding: 0.5rem; }
        .table-striped tbody tr:nth-of-type(odd) { background-color: #f9f9f9; }
        .table-bordered { border: 1px solid #dee2e6; }
        .table-bordered th, .table-bordered td { border: 1px solid #dee2e6; }
    </style>
</head>
<body>
    <div class="container">
        <h1>License Expired</h1>
        <p>Your license has expired. You have an outstanding balance of {{ $currencySymbol . $dueAmount }}.</p>

        <div class="table-responsive">
            <table id="lead-table" class="table-xs table-striped table-bordered" cellspacing="0" width="100%">
            </table>
        </div>
    </div>

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
                    {title: "Invoice No"},
                    {title: "Institute"},
                    {title: "Bill Date"},
                    {title: "Due Date"},
                    {title: "Bill Amount"},
                    {title: "Paid Amount"},
                    {title: "Status"},
                    {title: "PDF"},
                    {title: "Pay Link"}
                ],
                order: [[3, 'desc']],
                lengthMenu: [[10, 25, 50, 100, -1], ['10', '25', '50', '100', 'All']]
            });
        });
    </script>
</body>
</html>

