<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use PDF;

class GenerateurPdfController extends Controller
{

    public function pdfForm()
    {
        return view('pdf_');
    }

    public function pdfDownload(Request $request)
    {
        $data =
            [
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
                'destination' => $request->session()->get('destination'),
                'date' => $request->session()->get('date'),
                'heure' => $request->session()->get('heure'),
                'type_vehicule' => $request->session()->get('type_vehicule')
            ];
        $pdf = PDF::loadView('pdf-facture', $data);

        return $pdf->download('facture.pdf');
    }


}
