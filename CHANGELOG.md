# Changelog

All notable changes to `laravel-blade-spaceless` will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Changed

- Dropped runtime support for Laravel 6, 7, 8 and 9 (all EOL). Supported versions are now Laravel 10, 11, 12 and 13.
- Bumped the minimum PHP version to `^8.2`.
- Modernized the source with native return types, parameter types and Laravel Pint formatting.
- Replaced the `Blade` global alias with the fully qualified `Illuminate\Support\Facades\Blade` facade in the service provider.
- Re-wrote `config/spaceless.php` with documented section headings for `expelled_tags` and `enabled`.
- Pre-compiled directive output now terminates statements with a semicolon (`->spaceless();`) to keep the resulting PHP strict-mode clean.

### Added

- [Laravel Pint](https://laravel.com/docs/pint) for code style (Laravel preset, `pint.json`).
- [PHPStan](https://phpstan.org/) with [Larastan](https://github.com/larastan/larastan) at level 8 (`phpstan.neon.dist`).
- [Pest](https://pestphp.com/) test suite covering the directive's compile output, whitespace collapsing, expelled tags, the `> <` regression from #4, and the disabled state.
- `orchestra/testbench` for the package-level test harness (`tests/TestCase.php`).
- GitHub Actions workflows for running tests across PHP 8.2/8.3/8.4 × Laravel 10–13, and for verifying Pint formatting on every push and pull request.
- Composer scripts: `format`, `format:test`, `test`, `test:coverage`, `analyse`.

### Removed

- Legacy PHPUnit XML attributes (`backupGlobals`, `convertErrorsToExceptions`, ...) that were removed in PHPUnit 10/11.

## [1.4.1] - 2026-03-18

### Added

- Added support for Laravel 13. ([#6](https://github.com/mindtwo/laravel-blade-spaceless/pull/6))

## [1.4] - 2025-03-17

### Added

- Added support for Laravel 12. ([#5](https://github.com/mindtwo/laravel-blade-spaceless/pull/5))

### Fixed

- Collapse an extra space between adjacent HTML tags by running `str_replace('> <', '><', ...)` after the regex pass. ([#4](https://github.com/mindtwo/laravel-blade-spaceless/issues/4))

## [1.3.1] - 2025-03-17

> Released from the same commit as `1.4`. The tag was created as a patch-level alternative; both point at the spacing fix from #4 and the Laravel 12 support from #5.

## [1.3] - 2024-06-19

### Added

- Added support for Laravel 11. ([#3](https://github.com/mindtwo/laravel-blade-spaceless/pull/3))

## [1.2.2] - 2023-04-05

### Added

- Added support for Laravel 10. ([#2](https://github.com/mindtwo/laravel-blade-spaceless/pull/2))

## [1.2.1] - 2022-02-09

### Added

- Added support for Laravel 9. ([#1](https://github.com/mindtwo/laravel-blade-spaceless/pull/1))

## [1.2] - 2020-09-22

### Added

- Added support for Laravel 8.

## [1.1] - 2018-10-24

### Added

- Initial public release of the `@spaceless` / `@endspaceless` Blade directives.
- Configurable `expelled_tags` for elements whose inner whitespace must be preserved (defaults: `textarea`, `script`, `pre`, `style`).
- `SPACELESS_ENABLED` environment toggle for disabling the directive without removing it from templates.

[Unreleased]: https://github.com/mindtwo/laravel-blade-spaceless/compare/1.4.1...HEAD
[1.4.1]: https://github.com/mindtwo/laravel-blade-spaceless/compare/1.4...1.4.1
[1.4]: https://github.com/mindtwo/laravel-blade-spaceless/compare/1.3...1.4
[1.3.1]: https://github.com/mindtwo/laravel-blade-spaceless/compare/1.3...1.3.1
[1.3]: https://github.com/mindtwo/laravel-blade-spaceless/compare/1.2.2...1.3
[1.2.2]: https://github.com/mindtwo/laravel-blade-spaceless/compare/1.2.1...1.2.2
[1.2.1]: https://github.com/mindtwo/laravel-blade-spaceless/compare/1.2...1.2.1
[1.2]: https://github.com/mindtwo/laravel-blade-spaceless/compare/1.1...1.2
[1.1]: https://github.com/mindtwo/laravel-blade-spaceless/releases/tag/1.1
