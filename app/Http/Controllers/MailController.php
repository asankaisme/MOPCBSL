<?php

namespace App\Http\Controllers;

use App\Mail\GatepassVerify;
use App\Mail\SendMail;
use App\Mail\WelcomeEmail;
use App\Models\Gatepass;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //send email 
    public function sendWelcomeMail()
    {
        try {
            //code...
            $toMail = 'anushkae@myofficepal';
            $messagebody = 'This email is from laravel';
            $subject = 'Hi from the MOP';

           $response = Mail::to($toMail)->send(new WelcomeEmail($messagebody, $subject));
           dd($response);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function sendVerifyEmail(Gatepass $gatepass)
    {
        try {
            $toMail = $gatepass->userCreated->email;
            $messageBody = 'Your gatepass  #'.$gatepass->serialNo.' is now verified by '.$gatepass->userVerified->name;
            $subject = 'Gatepass has been verified.';
            $response = Mail::to($toMail)->send(new GatepassVerify($gatepass->id));
            dd($response);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
