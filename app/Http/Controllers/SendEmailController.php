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
        /* Création du pdf */
        $donnees_pdf = (new ValidationInformationsController())->getDonnees($requete);
        $donnees_pdf['imageQR'] = $requete->session()->get('ticket.imageQR');
        $donnees_pdf['codeQR'] = $requete->session()->get('ticket.QR');

        $pdf = PDF::loadView('pdf-facture', $donnees_pdf)->save('tickets/ticket_'.$donnees_pdf['codeQR'].'.pdf');

        $email = $requete->session()->get('ticket.email');
        $noms = $requete->session()->get('ticket.noms');
        $nom = $noms[0];
        $prenoms = $requete->session()->get('ticket.prenoms');
        $prenom = $prenoms[0];
        $date = $requete->session()->get('ticket.date');
        $heure = $requete->session()->get('ticket.heure');
        $depart = $requete->session()->get('ticket.depart');
        $destination = $requete->session()->get('ticket.destination');
        $emplacementPdf = "tickets/ticket_".$requete->session()->get('ticket.QR').".pdf";

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
