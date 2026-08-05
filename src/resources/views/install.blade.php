<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>License Installer</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .wrapper { max-width: 600px; margin: 60px auto; background: #fff; padding: 24px; border-radius: 8px; box-shadow: 0 0 20px rgba(0,0,0,0.08); }
        h1 { margin-top: 0; color: #222; }
        label { display: block; margin-bottom: 6px; font-weight: bold; }
        input[type="text"] { width: 100%; padding: 10px; margin-bottom: 16px; border: 1px solid #ccc; border-radius: 4px; }
        button { background: #007bff; color: #fff; border: none; padding: 12px 18px; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background: #0056b3; }
        .alert { padding: 12px 14px; margin-bottom: 16px; border-radius: 4px; }
        .alert-success { background: #e6ffed; color: #1b662f; border: 1px solid #b8f0c3; }
        .alert-error { background: #ffe6e6; color: #8a1f1f; border: 1px solid #f0b8b8; }
        .footer { margin-top: 20px; font-size: 14px; color: #666; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1>License Installer</h1>

        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        {{-- Error Messages --}}
        @if(isset($errors) && $errors->any())
            <div class="alert alert-error">
                <p><strong>There are errors with your submission:</strong></p>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('license.install.save') }}">
            @csrf

            <label for="license_key">License Key</label>
            <input id="license_key" type="text" name="license_key" value="{{ old('license_key', $licenseKey) }}" placeholder="Enter license key" required>

            <label for="api_url">API URL</label>
            <input id="api_url" type="text" name="api_url" value="{{ old('api_url', $apiUrl) }}" placeholder="Enter license API URL" required>

            <label for="invoice_url">Invoice URL</label>
            <input id="invoice_url" type="text" name="invoice_url" value="{{ old('invoice_url', $invoiceUrl) }}" placeholder="Enter invoice API URL" required>

            <p style="font-size: 14px; color: #555;">An encryption key will be generated automatically.</p>

            <button type="submit">Install License Manager</button>
        </form>

        <div class="footer">
            If the license keys are not set, this page is displayed until installation is complete.
        </div>
    </div>
</body>
</html>
