<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate as GateFacade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        GateFacade::define('admin', function (User $user) {
            return $user->level ==='admin';
                // abort(403, 'Anda Tidak Diizinkan Mengakses Halaman Ini');
            // }
        });

        GateFacade::define('visitor', function (User $user) {
            return $user->level ==='user';
                // abort(403, 'Anda Tidak Diizinkan Mengakses Halaman Ini');
            // }
        });
        GateFacade::define('head', function (User $user) {
            return $user->level ==='head';
                // abort(403, 'Anda Tidak Diizinkan Mengakses Halaman Ini');
            // }
        });
    }
}
