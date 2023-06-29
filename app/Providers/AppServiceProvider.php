<?php

namespace App\Providers;

use App\Services\Newsletter;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind('foo', function(){
        // app()->bind('foo', function(){
        //     return 'bar';
        // });

        // app()->bind(Newsletter::class, function(){
        //     return new Newsletter(
        //         new ApiClient(),
        //         'foobar1'
        //     );
        // });

        app()->bind(Newsletter::class, function(){
            // $client = new ApiClient();

            // $client->setConfig([       // inline gareko
            //     'apiKey' => config('services.mailchimp.key'),
            //     'server' => 'us8'
            // ]);

            $client = (new ApiClient)->setConfig([       // inline gareko
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us8'
            ]);

            return new Newsletter($client);
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
    }
}
