<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Services\MailchimpNewsletter;
use App\Http\Controllers\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __construct(protected Newsletter $newsletter) {

    }
    public function subscribe() {


        $attributes = request()->validate([
            'email' => 'required|email'
        ]);

        try {
            $this->newsletter->subscribe($attributes['email']);
        } catch (\Throwable $th) {
            throw ValidationException::withMessages([
                'email' => 'This e-mail could not be added our newsletters.'
            ]);
        }

        return redirect('/')->with('success','You are now signed up our newsletter!');
    }
}
