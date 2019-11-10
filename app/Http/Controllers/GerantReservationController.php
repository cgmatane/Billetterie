<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Pages\ValidationInformationsController;
use App\Mail\SendMail;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GerantReservationController extends Controller
{

    function gerer(Request $requete)
    {
        $this->envoyerPDF($requete);
        $this->creerBillet($requete);
        return redirect(route('index'));
    }

    private function envoyerPDF($requete) {
        /* Création du pdf du billet */
        $donneesPdfBillet = (new ValidationInformationsController())->getDonnees($requete);
        $donneesPdfBillet['imageQR'] = $requete->session()->get('ticket.imageQR');
        $donneesPdfBillet['codeQR'] = $requete->session()->get('ticket.QR');
        date_default_timezone_set("America/New_York");
        $donneesPdfBillet['dateEmission'] = date('Y/m/d H:i:s');

        $emplacementPdfBillet = "billets/billet_".$requete->session()->get('ticket.QR').".pdf";
        $pdf_billet = PDF::loadView('pdf_billet', $donneesPdfBillet)->save($emplacementPdfBillet);


        $email = $requete->session()->get('ticket.email');
        $noms = $requete->session()->get('ticket.noms');
        $nom = $noms[0];
        $prenoms = $requete->session()->get('ticket.prenoms');
        $prenom = $prenoms[0];
        $date = $requete->session()->get('ticket.date');
        $heure = $requete->session()->get('ticket.heure');
        $depart = $requete->session()->get('ticket.depart');
        $destination = $requete->session()->get('ticket.destination');

        /* Création du pdf de la facture */
        $donneesPdfFacture = array(
            'donneesPdfFacture' => array(
                'nomClient' => $nom,
                'prenomClient' => $prenom,
                'montantCommande' => 45,
                'numeroCarte' => $requete->session()->get('paiement.carte'),
                'titulaireCarte' => $requete->session()->get('paiement.nom'),
                'datePaiement' =>  $requete->session()->get('paiement.date')
            )
        );

        $emplacementPdfFacture = "factures/facture_".$requete->session()->get('ticket.QR').".pdf";

        // génération du pdf
        $pdf_facture = PDF::loadView('pdf_facture', $donneesPdfFacture)->save($emplacementPdfFacture);

        $data = array(
            'nom'      => $nom ,
            'prenom'      => $prenom,
            'date'      => $date,
            'heure'      => $heure,
            'depart'      => $depart,
            'destination'      => $destination,
            'emplacementPdfBillet'      => $emplacementPdfBillet,
            'emplacementPdfFacture'      => $emplacementPdfFacture
            //'message'   =>   $request->message
        );

        Mail::to($email)->send(new SendMail($data));

        /* Suppression des pdf */
        $this->supprimerPDF($emplacementPdfBillet);
        $this->supprimerPDF($emplacementPdfFacture);
    }

    private function creerBillet($requete) {

    }


    /**
     * @param string $emplacementPDF
     */
    private function supprimerPDF(string $emplacementPDF): void
    {
        if (file_exists($emplacementPDF)) {
            unlink($emplacementPDF);
        }
    }
}
