<?php

namespace App\Http\Controllers;

use App\Mail\SignpEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function sendSignupEmail($name, $email, $verification_code)
    {
        $data = [
            'name' => $name,
            'verification_code' => $verification_code,
        ];
        Mail::to($email)->send(new SignpEmail($data));
    }
}
