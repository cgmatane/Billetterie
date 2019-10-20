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

    function send(Request $requete)
    {
        $email = $requete->session()->get('ticket.email');
        $noms = $requete->session()->get('ticket.noms');
        $nom = $noms[0];
        $prenoms = $requete->session()->get('ticket.prenoms');
        $prenom = $prenoms[0];
        $date = $requete->session()->get('ticket.date');
        $heure = $requete->session()->get('ticket.heure');
        $depart = $requete->session()->get('ticket.depart');
        $destination = $requete->session()->get('ticket.destination');

        $data = array(
            'nom'      => $nom ,
            'prenom'      => $prenom,
            'date'      => $date,
            'heure'      => $heure,
            'depart'      => $depart,
            'destination'      => $destination
            //'message'   =>   $request->message
        );

        Mail::to($email)->send(new SendMail($data));
        return redirect('/confirmation');

    }
}
