# Spaceless Larvel Blade Directive
[![Latest Stable Version](https://img.shields.io/packagist/v/mindtwo/laravel-blade-spaceless?style=flat-square)](https://packagist.org/packages/mindtwo/laravel-blade-spaceless)
[![Total Downloads](https://img.shields.io/packagist/dt/mindtwo/laravel-blade-spaceless?style=flat-square)](https://packagist.org/packages/mindtwo/laravel-blade-spaceless)
[![MIT Software License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](LICENSE.md)


## Installation

You can install the package via composer:

```bash
composer require mindtwo/laravel-blade-spaceless
```

The package will register itself automatically. 

Optionally you can publish the package configuration using:

```bash
php artisan vendor:publish --provider=mindtwo\\Spaceless\\SpacelessServiceProvider
```

## How to use?

The new blade directives `@spaceless` and `@endspaceless` are now available in your blade views:

```html
@spaceless
<!DOCTYPE html>
<html>
    <head></head>
    <body></body>
</html>
@endspaceless
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email info@mindtwo.de instead of using the issue tracker.

## Credits

- [mindtwo GmbH](https://github.com/mindtwo)
- [All Other Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
 
