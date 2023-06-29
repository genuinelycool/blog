<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

// new Newsletter (new ApiClient);

class Newsletter
{
        // protected ApiClient $client;
        // protected string $foo;
        // protected $client;
        // protected $foo;

        // public function __construct(ApiClient $client)
        // public function __construct(ApiClient $client, string $foo)
        // php8

    // public function __construct(protected ApiClient $client, protected string $foo)
    public function __construct(protected ApiClient $client)
    {
        //
    }


    public function subscribe (string $email, string $list = null) {

        // $list ??= config('services.mailchimp.lists.subscribers');   //null safe assignment operator
        if (!isset($list)) {
            $list = config('services.mailchimp.lists.subscribers');
        }

        // return $this->client()->lists->addListMember($list, [
        return $this->client->lists->addListMember($list, [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }

    // protected function client() {
    //     // return (new ApiClient())->setConfig([       // inline gareko
    //     return $this->client->setConfig([       // inline gareko
    //         'apiKey' => config('services.mailchimp.key'),
    //         'server' => 'us8'
    //     ]);
    // }
}
