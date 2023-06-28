<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    // public function subscribe (string $email) {
    public function subscribe (string $email, string $list = null) {
        // $list ??= config('services.mailchimp.lists.subscribers');   //null safe assignment operator

        if (!isset($list)) {
            $list = config('services.mailchimp.lists.subscribers');
        }

        // $mailchimp = new ApiClient();

        // $mailchimp->setConfig([
        //     'apiKey' => config('services.mailchimp.key'),
        //     'server' => 'us8'
        // ]);

        // return $mailchimp->lists->addListMember('ee840d381d', [
        // return $mailchimp->lists->addListMember($list, [
        return $this->client()->lists->addListMember($list, [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }

    protected function client() {
        // $mailchimp = new ApiClient();

        // return $mailchimp->setConfig([
        //     'apiKey' => config('services.mailchimp.key'),
        //     'server' => 'us8'
        // ]);

        return (new ApiClient())->setConfig([       // inline gareko
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us8'
        ]);
    }
}
