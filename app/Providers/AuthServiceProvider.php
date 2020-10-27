<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

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

        /* define a admin user role */
        Gate::define('isAdmin', function($user) {
            return $user->role == 'admin';
         });
    
         /* define a user role */
         Gate::define('isUser', function($user) {
             return $user->role == 'customer';
         });

        Passport::routes();

        Passport::tokensCan([
            'view-category'         =>  'View Categories',
            'create-categories'     =>  'Create Categories',
            'update-categories'     =>  'Update Categories',
            'delete-categories'     =>  'Delete Categories',
            'view-products'         =>  'View Products',
            'create-products'       =>  'Create Products',
            'update-products'       =>  'Update Products',
            'delete-products'       =>  'Delete Products',
        ]);

        Passport::tokensExpireIn(now()->addDays(15));
    }
}
