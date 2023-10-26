<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Services\Newsletter;
use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements Newsletter
{
    public function __construct(protected ApiClient $client) {

        $this->client->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us8'
        ]);

    }
    public function subscribe(string $email,string $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscribers');

        $response = $this->client->lists->addListMember($list,[
            'email_address' => $email,
            'status' => 'subscribed',
        ]);
    }

    public function unsubscribe() {

    }
}
