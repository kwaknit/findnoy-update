<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public static function registration_info_email($data = [])
    {
        Mail::send('emails.registration_info', $data, function($message) use ($data) {
            $message->to($data['email'], $data['first_name'] . ' ' . $data['last_name'])
                    ->subject('Welcome | FindNoy');
        });
    }

    public static function password_reset_email($data = [])
    {
        Mail::send('emails.password_reset', $data, function($message) use ($data) {
            $message->to($data['EmailAddress'], $data['Name'])
                    ->subject('Password Reset | Crestive International');
        });
    }
}
