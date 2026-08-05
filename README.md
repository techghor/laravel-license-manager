# Laravel License Manager

This Laravel package provides a License Manager system that allows you to easily integrate license checking into your Laravel projects. It performs a license check once per day to reduce API calls and improve performance.

## Installation

1. Install the package via Composer: composer require techghor/laravel-license-manager

## Manual License Check

If you need to force a license check at any time, the package provides a manual route.

- Route name: `license.check`
- URL: `/license/check`

Example usage:

```php
// Redirect to the manual license check route
return redirect()->route('license.check');
```

This route will immediately run the license validation and:

- redirect to the install page if the package is not configured yet
- redirect to the payment page if a payment is due
- return back with a success message if the license is valid

If your application uses cache or route caching, make sure to clear it after installing the package:

```bash
php artisan config:clear
php artisan route:clear
php artisan cache:clear
```

