<?php

namespace App\Providers;

use App\Models\Profile;
use App\Models\publication;
use App\Policies\publicationPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\GenericUser;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        publication::class => publicationPolicy::class,
    ]; 


    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Gate::define('update-publication',function(GenericUser $profile,publication $publication) {
        //     return $profile->isAdmin ? Response::allow() : Response::deny(); 

        //     return $profile->id === $publication->profile_id;
        // });
    }
}
