<?php

namespace App\Providers;

use App\Models\DataPerdin;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
            return $user->level_admin->slug === 'operator' || $user->level_admin->slug === 'admin';
        });
        Gate::define('isApproval', function(User $user){
            return $user->level_admin->slug === 'approval'|| $user->level_admin->slug === 'admin';
        });
        Gate::define('isApprovalOperator', function(User $user){
            return $user->level_admin->slug === 'approval'|| $user->level_admin->slug === 'operator' || $user->level_admin->slug === 'admin';
        });

        View::composer('*', function ($view) {
            if (auth()->user()) {
                $authUser = auth()->user();

                if ($authUser->level_admin->slug === 'approval') {
                    $data_perdins = DataPerdin::where('jabatan_id', $authUser->jabatan_id)->get();
                } else {
                    $data_perdins = DataPerdin::all();
                }

                $totalBaru = $data_perdins->filter(function ($data) {
                    return $data->status->approve === null;
                })->count();

                $totalDitolak = $data_perdins->filter(function ($data) {
                    return $data->status->approve === 0;
                })->count();

                $totalNoLaporan = $data_perdins->filter(function ($data) {
                    return $data->status->approve === 1 && $data->status->lap === null;
                })->count();

                $totalBelumBayar = $data_perdins->filter(function ($data) {
                    return $data->status->approve === 1 && $data->status->lap === 1 && $data->status->kwitansi === null;
                })->count();

                $totalSudahBayar = $data_perdins->filter(function ($data) {
                    return $data->status->approve === 1 && $data->status->lap === 1 && $data->status->kwitansi === 1;
                })->count();

                $view->with([
                    'totalBaru' => $totalBaru,
                    'totalDitolak' => $totalDitolak,
                    'totalNoLaporan' => $totalNoLaporan,
                    'totalBelumBayar' => $totalBelumBayar,
                    'totalSudahBayar' => $totalSudahBayar,
                ]);
            }
        });
    }
}
