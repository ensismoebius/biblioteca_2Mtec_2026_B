<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(UrlGenerator $url): void
    {
        if ($this->app->environment('production')) {
            $url->forceScheme('https');
        }

        Gate::define('ver-auditoria', function (Authenticatable $user): bool {
            return in_array($user->email, config('auditoria.administradores'), true);
        });
    }
}