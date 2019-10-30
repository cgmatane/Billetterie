<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Pages\ValidationInformationsController;
use App\Mail\SendMail;
use PDF;
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
        /* Création du pdf du billet */
        $donneesPdfBillet = (new ValidationInformationsController())->getDonnees($requete);
        $donneesPdfBillet['imageQR'] = $requete->session()->get('ticket.imageQR');
        $donneesPdfBillet['codeQR'] = $requete->session()->get('ticket.QR');
        date_default_timezone_set("America/New_York");
        $donneesPdfBillet['dateEmission'] = date('Y/m/d H:i:s');

        $emplacementPdf = "billets/billet_".$requete->session()->get('ticket.QR').".pdf";

        $pdf_billet = PDF::loadView('pdf_billet', $donneesPdfBillet)->save($emplacementPdf);

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
            'destination'      => $destination,
            'emplacementPdf'      => $emplacementPdf
            //'message'   =>   $request->message
        );

        Mail::to($email)->send(new SendMail($data));
        if (file_exists($emplacementPdf)) {
            unlink($emplacementPdf);
        }
        return redirect('/confirmation');

    }
}
