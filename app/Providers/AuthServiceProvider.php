<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;


use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\ShelterModel;
use App\Models\SugargliderModel;
use App\Models\CollectionModel;
use App\Policies\ShelterPolicy;
use App\Policies\SugargliderPolicy;
use App\Policies\CollectionPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        ShelterModel::class => ShelterPolicy::class,
        SugargliderModel::class => SugargliderPolicy::class,
        CollectionModel::class => CollectionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
