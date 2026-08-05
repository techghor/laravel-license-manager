<?php

namespace TechGhor\LaravelLicenseManager\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
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
            $result = $this->licenseManager->checkLicense();
        } catch (\Exception $e) {
            return response("License Error: " . $e->getMessage(), 403);
        }

        if ($result instanceof Response || $result instanceof RedirectResponse) {
            return $result;
        }

        return $next($request);
    }
}

