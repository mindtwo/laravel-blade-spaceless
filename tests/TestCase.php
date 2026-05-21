<?php

namespace mindtwo\Spaceless\Tests;

use Illuminate\Foundation\Application;
use mindtwo\Spaceless\SpacelessServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * Get the package providers loaded for tests.
     *
     * @param  Application  $app
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [
            SpacelessServiceProvider::class,
        ];
    }
}
