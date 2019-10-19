<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    function index()
    {
        return view('reservation_confirmation');
    }

    function send(Request $request)
    {
        $data = array(
            'nom'      =>  "loic",
            //'message'   =>   $request->message
        );

        Mail::to('h-loic@orange.fr')->send(new SendMail($data));
        return redirect('/confirmation');

    }
}
