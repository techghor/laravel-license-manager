<?php

namespace TechGhor\LaravelLicenseManager\Http\Controllers;

use TechGhor\LaravelLicenseManager\LicenseManager;
use Illuminate\Http\Request;

class LicenseController
{
    protected $licenseManager;

    public function __construct(LicenseManager $licenseManager)
    {
        $this->licenseManager = $licenseManager;
    }

    public function payment(Request $request)
    {
        $dueAmount = number_format($request->get('due', 0), 2, '.', '');
        $currencySymbol = $request->get('currency', 'Tk. ');
        $paymentUrl = $request->get('payment_url', '#');

        $config = config('license');
        $invoiceApi = $config['invoice_url'];
        $encryptedLicenseKey = $config['license_key'];
        $decryptedLicenseKey = $this->licenseManager->decrypt($encryptedLicenseKey);

        return view('license-manager::payment', compact('dueAmount', 'currencySymbol', 'paymentUrl', 'invoiceApi', 'decryptedLicenseKey'));
    }

    public function install()
    {
        $config = config('license');

        $licenseKey = $config['license_key'] ?? '';
        $encryptionKey = $config['encryption_key'] ?? '';

        $installed = !empty($licenseKey) && !empty($encryptionKey);

        return view('license-manager::install', [
            'licenseKey' => $licenseKey,
            'apiUrl' => $config['api_url'] ?? '',
            'invoiceUrl' => $config['invoice_url'] ?? '',
            'installed' => $installed,
        ]);
    }

    public function manualCheck()
    {
        $result = $this->licenseManager->checkLicense(true);

        if ($result !== true) {
            return $result;
        }

        return redirect()->back()->with('status', 'License check completed successfully.');
    }

    public function installSave(Request $request)
    {
        $request->validate([
            'license_key' => 'required|string',
            'api_url' => 'required|url',
            'invoice_url' => 'required|url',
        ]);

        $licenseKey = $request->input('license_key');
        $apiUrl = $request->input('api_url');
        $invoiceUrl = $request->input('invoice_url');

        $encryptionKey = bin2hex(random_bytes(32));
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC'));
        $encryptedLicenseKey = base64_encode(openssl_encrypt($licenseKey, 'AES-256-CBC', $encryptionKey, 0, $iv) . '::' . $iv);

        $configPath = config_path('license.php');
        $configContent = "<?php\n\nreturn [\n";
        $configContent .= "    'api_url' => '" . addslashes($apiUrl) . "',\n";
        $configContent .= "    'invoice_url' => '" . addslashes($invoiceUrl) . "',\n";
        $configContent .= "    'license_key' => '" . addslashes($encryptedLicenseKey) . "',\n";
        $configContent .= "    'encryption_key' => '" . addslashes($encryptionKey) . "',\n";
        $configContent .= "];\n";

        if (!file_put_contents($configPath, $configContent)) {
            return redirect()->route('license.install')
                ->withErrors(['config' => 'Failed to write configuration file.'])
                ->withInput();
        }

        return redirect()->route('license.install')->with('status', 'License Manager installed successfully.');
    }
}

