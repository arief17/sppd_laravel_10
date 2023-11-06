<?php

namespace App\Providers;

use App\Models\User;
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
    public function boot(): void
    {
        Gate::define('isAdmin', function(User $user){
            return $user->level_admin->slug === 'admin';
        });
        Gate::define('isOperator', function(User $user){
            return $user->level_admin->slug === 'operator';
        });
        Gate::define('isPegawai', function(User $user){
            return $user->level_admin->slug === 'pegawai';
        });

        Gate::define('isAdminOrOperator', function(User $user){
            return $user->level_admin->slug === 'admin' || $user->level_admin->slug === 'operator';
        });
    }
}
