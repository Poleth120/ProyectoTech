<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Contrato;
use App\Policies\ContratoPolicy;
use App\Policies\ActiveUserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [Contrato::class => ContratoPolicy::class];
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-personal', function (User $user)
        {
            return $user->tipo_usuario == '1';
        });

        Gate::define('manage-contratos', function (User $user)
        {
            return $user->state == '1';
        });
    }
}
