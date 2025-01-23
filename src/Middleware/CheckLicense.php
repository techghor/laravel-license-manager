<?php

namespace TechGhor\LaravelLicenseManager\Middleware;

use Closure;
use TechGhor\LaravelLicenseManager\LicenseManager;

class CheckLicense
{
    protected $licenseManager;

    public function __construct(LicenseManager $licenseManager)
    {
        $this->licenseManager = $licenseManager;
    }

    public function handle($request, Closure $next)
    {
        try {
            $this->licenseManager->checkLicense();
        } catch (\Exception $e) {
            return response("License Error: " . $e->getMessage(), 403);
        }

        return $next($request);
    }
}

