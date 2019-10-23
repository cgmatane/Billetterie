<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Pages\ValidationInformationsController;
use Illuminate\Http\Request;
use Redirect;
use PDF;

class GenerateurPdfController extends Controller
{

    public function pdfForm()
    {
        return view('pdf_');
    }

    public function pdfDownload(Request $requete)
    {
        $donnees_pdf = (new ValidationInformationsController())->getDonnees($requete);
        $donnees_pdf['imageQR'] = $requete->session()->get('ticket.imageQR');

        $pdf = PDF::loadView('pdf-facture', $donnees_pdf)/*->save('pdf.pdf')*/; // Décommenter pour enregistrer le pdf sur le SERVEUR

        return $pdf->stream();
    }


}
