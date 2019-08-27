# Force Https

[![Packagist](https://img.shields.io/packagist/v/toyi/force-https.svg)](https://packagist.org/packages/toyi/force-https)

Provide a simple and convenient way to force Https.

## Installation

Install via composer
```bash
composer require toyi/force-https
```

### Register Service Provider

**Note! This and next step are optional if you use laravel>=5.5 with package
auto discovery feature.**

Add service provider to `config/app.php` in `providers` section
```php
Toyi\ForceHttps\ServiceProvider::class,
```


### Publish Configuration File

```bash
php artisan vendor:publish --provider="Toyi\ForceHttps\ServiceProvider" --tag="config"
```

## Usage

Add the `Toyi\ForceHttps\ForceHttps::class` middleware in the web middleware group.

## Security

If you discover any security related issues, please email 
instead of using the issue tracker.

## Credits

- [](https://github.com/toyi/force-https)
- [All contributors](https://github.com/toyi/force-https/graphs/contributors)

This package is bootstrapped with the help of
[melihovv/laravel-package-generator](https://github.com/melihovv/laravel-package-generator).
