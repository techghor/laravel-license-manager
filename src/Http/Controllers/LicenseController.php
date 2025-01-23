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
}

