<?php

namespace App\Providers;

use App\Models\Enrollment;
use App\Repository\Course\EloquentCourseRepository;
use App\Repository\Enrollment\EloquentEnrollmentRepository;
use App\Repository\Student\EloquentStudentRepository;
use App\RepositoryInterface\CourseRepositoryInterface;
use App\RepositoryInterface\EnrollmentRepositoryInterface;
use App\RepositoryInterface\StudentRepositoryInterface;
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
        $this->app->bind(StudentRepositoryInterface::class,EloquentStudentRepository::class);
        $this->app->bind(CourseRepositoryInterface::class,EloquentCourseRepository::class);
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
