<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class
        );

        $this->app->bind(
            \App\Repositories\Vessel\VesselRepositoryInterface::class,
            \App\Repositories\Vessel\VesselRepository::class
        );

        $this->app->bind(
            \App\Repositories\Auth\AuthRepositoryInterface::class,
            \App\Repositories\Auth\AuthRepository::class
        );

        $this->app->bind(
            \App\Repositories\Organization\OrganizationRepositoryInterface::class,
            \App\Repositories\Organization\OrganizationRepository::class
        );

        $this->app->bind(
            \App\Repositories\ServiceLine\ServiceLineRepositoryInterface::class,
            \App\Repositories\ServiceLine\ServiceLineRepository::class
        );

        $this->app->bind(
            \App\Repositories\Category\CategoryRepositoryInterface::class,
            \App\Repositories\Category\CategoryRepository::class
        );

        $this->app->bind(
            \App\Repositories\Ticket\TicketRepositoryInterface::class,
            \App\Repositories\Ticket\TicketRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
