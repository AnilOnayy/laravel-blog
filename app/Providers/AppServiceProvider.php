<?php

namespace App\Providers;

use App\Http\Controllers\Services\MailchimpNewsletter;
use App\Http\Controllers\Services\Newsletter;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->bind('foo',function() {
            return 'bar';
        });


        app()->bind(Newsletter::class,function() {
            return new MailchimpNewsletter(new ApiClient());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();

        Gate::define('admin',function(User $user){
            return $user->username === 'reksnomq';
        });

        Blade::if('admin', function() {
            return request()->user()?->can('admin');
        });
    }
}
