<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('admin', function () {

            if (User::isAdmin()) {
                return true;
            }
        });



        Gate::define('admin_controller', function () {
            if (User::isAdmin() || User::isController()) {
                return true;
            }
        });

        Gate::define('admin_controller_examinee', function () {
            if (User::isAdmin() || User::isController() || User::isExaminee()) {
                return true;
            }
        });
        Gate::define('no_one', function () {
            if (User::isAdmin() && User::isController() && User::isExaminee()) {
                return true;
            }
        });
        Gate::define('examinee', function () {

            if (User::isExaminee()) {
                return true;
            }
        });
    }
}
