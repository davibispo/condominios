<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use App\Models\Permission;
//use App\Models\Role;
//use App\Policies\RolePolicy;

class AuthServiceProvider extends ServiceProvider {

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'App\Model' => 'App\Policies\ModelPolicy',
        //Role::class => RolePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot() {
        /* comentar este conteudo antes de fazer MIGRATE */
        $this->registerPolicies();
       
        $permissions = Permission::with('roles')->get();

        foreach($permissions as $permission){
            Gate::define($permission->name, function(User $user) use ($permission){
                return $user->hasPermission($permission);
            });
        }
        
        Gate::before(function(User $user, $ability){
            if ($user->hasAnyRoles('adm')){
                return true;
            }
        });
       
    }

}
