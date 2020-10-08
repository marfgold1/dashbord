<?php

namespace App\Providers;

use App\User;
use App\Webinar;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function($user, $ability) {
            if ($user->hasPermission($ability)) {
                return true;
            }
        });
        Gate::define('update-webinar', function(User $user, Webinar $webinar){
            if($user->role->name == 'administrator') return true;
            return $webinar->creator->is($user);
        });
    }
}
