<?php

namespace App\Providers;

use App\Models\Menu;
use App\Policies\MenuPolicy;
use App\Models\Social;
use App\Policies\SocialPolicy;
use App\Models\Role;
use App\Policies\RolePolicy;
use App\Models\Permission;
use App\Policies\PermissionPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Model' => 'App\Policies\ModelPolicy',
        Menu::class => MenuPolicy::class,
        Social::class => SocialPolicy::class,
        Role::class => RolePolicy::class,
        Permission::class => PermissionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create-menu', 'App\Policies\MenuPolicy@create');
        Gate::define('create-social', 'App\Policies\SocialPolicy@create');
        Gate::define('update-menu', 'App\Policies\MenuPolicy@update');
    }
}
