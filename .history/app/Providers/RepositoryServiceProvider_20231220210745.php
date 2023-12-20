<?php

namespace App\Providers;

use App\Models\Enrollment;
use App\Repository\EloquentEnrollmentRepository;
use App\RepositoryInterface\EnrollmentRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EnrollmentRepositoryInterface::class,EloquentEnrollmentRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
