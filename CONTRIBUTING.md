# Contributing

Contributions are **welcome** and will be fully **credited**.

We accept contributions via Pull Requests on [GitHub](https://github.com/mindtwo/laravel-blade-spaceless).

## Pull Requests

- **Code style** — Run [Laravel Pint](https://laravel.com/docs/pint) before pushing. The repository uses the `laravel` preset configured in `pint.json`.
- **Static analysis** — Code must pass [PHPStan](https://phpstan.org/) level 8 via [Larastan](https://github.com/larastan/larastan).
- **Tests** — Patches must ship with [Pest](https://pestphp.com/) tests covering the change. Bug fixes should include a regression test.
- **Documentation** — Update `README.md` and any relevant comments when behaviour changes.
- **SemVer** — This project follows [SemVer v2.0.0](https://semver.org/). Avoid breaking the public API outside major releases.
- **Feature branches** — Open pull requests from a feature branch, not from `master`.
- **One change per pull request** — Smaller pull requests get reviewed faster.
- **Tidy history** — Squash intermediate commits so each commit on the branch is meaningful.

## Local quality checks

```bash
composer install

composer format       # apply Pint fixes
composer format:test  # check formatting without modifying files
composer analyse      # PHPStan level 8
composer test         # Pest test suite
```

All four commands run in CI on every push and pull request — fixing them locally first saves a round-trip.

**Happy coding!**
