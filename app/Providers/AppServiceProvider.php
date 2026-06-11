<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Country;
use App\Policies\CountryPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Override;

class AppServiceProvider extends ServiceProvider
{
    #[Override]
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::policy(Country::class, CountryPolicy::class);

        View::composer('components.layouts.guest', function ($view) {
            $view->with('countries', Country::orderBy('country_name', 'asc')->get());
        });
    }
}
