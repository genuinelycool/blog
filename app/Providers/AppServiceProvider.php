<?php

namespace App\Providers;

use App\Services\ConvertKitNewsletter;
use App\Services\MailchimpNewsletter;
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
    }
}
