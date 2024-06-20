<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //send email 
    public function sendMail()
    {
        try {
            //code...
            echo 'hit';
            Mail::to('asankacrk@cbsl.lk')->send(new SendMail());
            echo 'done';
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
