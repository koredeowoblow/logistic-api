<?php

namespace App\Providers;

use App\Http\Middleware\Authenticate as MiddlewareAuthenticate;
use App\Repositories\UserRepository;
use App\Services\AuthService;
use App\Services\UserService;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Container\Attributes\Auth;
use App\Services\Transportation\TransportationModeCategoryService;
use App\Repositories\Transportations\TransportationCategoryRepository;

use App\Services\Transportation\TransportationModelService;
use App\Repositories\Transportations\TransportationModelRepository;
use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(AuthService::class, function () {
            return new AuthService(new UserRepository);
        });
        $this->app->bind(Authenticate::class, MiddlewareAuthenticate::class);
        $this->app->bind(TransportationModeCategoryService::class, function () {
            return new TransportationModeCategoryService(new TransportationCategoryRepository);
        });
        $this->app->bind(UserService::class, function(){
            return new UserService(new UserRepository);
        });
        $this->app->bind(TransportationModelService::class);
        $this->app->bind(CountryRepository::class, function ($app) {
            return new CountryRepository($app->make(\App\Models\Locations\Country::class));
        });
        $this->app->bind(CountryService::class, function ($app) {
            return new CountryService($app->make(CountryRepository::class));
        });
        $this->app->bind(StateRepository::class, function ($app) {
            return new StateRepository($app->make(\App\Models\Locations\State::class));
        });
        $this->app->bind(StateService::class, function ($app) {
            return new StateService($app->make(StateRepository::class));
        });
        $this->app->bind(LocationRepository::class, function ($app) {
            return new LocationRepository($app->make(\App\Models\Locations\Location::class));
        });
        $this->app->bind(LocationService::class, function ($app) {
            return new LocationService($app->make(LocationRepository::class));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
