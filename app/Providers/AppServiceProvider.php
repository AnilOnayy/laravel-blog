<?php

namespace App\Providers;

use App\Http\Controllers\Services\MailchimpNewsletter;
use App\Http\Controllers\Services\Newsletter;
use Illuminate\Database\Eloquent\Model;
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
    }
}
