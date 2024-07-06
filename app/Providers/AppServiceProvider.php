<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//bind repository
use App\Repositories\Interface\TeacherRepositoryInterface;
use App\Repositories\TeacherRepository;
use App\Repositories\Interface\ClassRepositoryInterface;
use App\Repositories\ClassRepository;
use App\Repositories\Interface\SectionRepositoryInterface;
use App\Repositories\SectionRepository;
use App\Repositories\Interface\SubjectRepositoryInterface;
use App\Repositories\SubjectRepository;
use App\Repositories\Interface\SlotRepositoryInterface;
use App\Repositories\SlotRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
        $this->app->bind(ClassRepositoryInterface::class, ClassRepository::class);
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
        $this->app->bind(SubjectRepositoryInterface::class, SubjectRepository::class);
        $this->app->bind(SlotRepositoryInterface::class, SlotRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
