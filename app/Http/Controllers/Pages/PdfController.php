<?php

namespace App\Http\Controllers\Pages;


use App\Commande;
use App\Http\Controllers\PageController;

use App\Statics\Views\interfaces\connexion\DonneesVueConnexion;
use Illuminate\Http\Request;

class PdfController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('pdf');
//        $this->setDonneesStatiques(new DonneesVueConnexion());
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
    }

    public function pdfDownload(Request $request){

        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $data =
            [
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message
            ];
        var_dump($data);
        $pdf = PDF::loadView('pdf_dl', $data);

        return $pdf->download('tutsmake.pdf');
    }
}
