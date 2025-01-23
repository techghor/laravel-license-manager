<?php

namespace TechGhor\LaravelLicenseManager;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class LicenseManager
{
    private $apiUrl;
    private $invoiceApi;
    private $licenseKey;
    private $encryptionKey;

    public function __construct(array $config)
    {
        $this->apiUrl = $config['api_url'];
        $this->invoiceApi = $config['invoice_url'];
        $this->licenseKey = $config['license_key'];
        $this->encryptionKey = $config['encryption_key'];
    }

    public function checkLicense()
    {
        if ($this->shouldPerformCheck()) {
            $decryptedLicenseKey = $this->decrypt($this->licenseKey);
            $apiEndpoint = $this->apiUrl . '/' . $decryptedLicenseKey;

            $response = Http::get($apiEndpoint);

            if ($response->failed()) {
                throw new Exception("Failed to connect to license server");
            }

            $data = $response->json();

            if (!$this->validateResponse($data)) {
                throw new Exception("Invalid response from license server");
            }

            if ($data['payment_received'] < $data['invoice_value']) {
                $dueAmount = $data['invoice_value'] - $data['payment_received'];
                return redirect()->route('license.payment', ['due' => $dueAmount]);
            }

            $this->updateLastCheckDate();
        }

        return true;
    }

    private function shouldPerformCheck()
    {
        return !Cache::has('last_license_check') || Cache::get('last_license_check') !== now()->toDateString();
    }

    private function updateLastCheckDate()
    {
        Cache::put('last_license_check', now()->toDateString(), now()->addDay());
    }

    private function validateResponse($data)
    {
        return isset($data['id']) &&
               isset($data['company_name']) &&
               isset($data['payment_received']) &&
               isset($data['invoice_value']);
    }

    public function decrypt($data)
    {
        list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
        return openssl_decrypt($encrypted_data, 'AES-256-CBC', $this->encryptionKey, 0, $iv);
    }
}

