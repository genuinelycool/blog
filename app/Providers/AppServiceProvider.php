<?php

namespace App\Providers;

use App\Models\User;
use App\Services\Newsletter;
use MailchimpMarketing\ApiClient;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Services\MailchimpNewsletter;
use App\Services\ConvertKitNewsletter;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        app()->bind(Newsletter::class, function(){
            $client = (new ApiClient)->setConfig([       // inline gareko
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us8'
            ]);

            return new MailchimpNewsletter($client);
            // return new ConvertKitNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        // Paginator::useBootstrap();

        Model::unguard();

        Gate::define('admin', function (User $user) {
            // auth()->user()?->username !== 'devusername';
            return $user->username === 'devusername';
        });

        Blade::if('admin', function(){
            // return request()->user()->can('admin');     // Not quite right
            return request()->user()?->can('admin');     // Not quite right
        });
    }
}
