<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send() {
        $data = [
            "title" => "Test Title",
            "body" => "Test Body"
        ];

        Mail::to("bogur007@gamil.com")->send(new TestMail($data));

        return "Done";
    }
}
