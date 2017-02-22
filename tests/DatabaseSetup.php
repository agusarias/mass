<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;

trait DatabaseSetup
{
    /**
     * Define hooks to migrate and seed the database before and after each test.
     *
     * @return void
     */
    public function runDatabaseSetup()
    {
        $this->artisan('migrate:reset');
        $this->artisan('migrate');
        $this->artisan('db:seed');

        $this->app[Kernel::class]->setArtisan(null);

        $this->beforeApplicationDestroyed(function () {
            $this->artisan('migrate:rollback');
        });
    }
}
