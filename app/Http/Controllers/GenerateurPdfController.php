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

        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $request->session()->put("lenom", $request->name);
        $data =
            [
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message
            ];
        $pdf = PDF::loadView('pdf-facture', $data);

        return $pdf->download('test.pdf');
    }


}
