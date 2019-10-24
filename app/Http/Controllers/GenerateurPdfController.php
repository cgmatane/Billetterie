<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Pages\ValidationInformationsController;
use Illuminate\Http\Request;
use Redirect;
use PDF;

class GenerateurPdfController extends Controller
{

    public function creerPdf(Request $requete)
    {
        $donnees_pdf = (new ValidationInformationsController())->getDonnees($requete);
        $donnees_pdf['imageQR'] = $requete->session()->get('ticket.imageQR');
        $donnees_pdf['codeQR'] = $requete->session()->get('ticket.QR');

        $pdf = PDF::loadView('pdf-facture', $donnees_pdf)->save('tickets/ticket_'.$donnees_pdf['codeQR'].'.pdf'); // Décommenter pour enregistrer le pdf sur le SERVEUR

        return redirect('/confirmation');
    }


}
