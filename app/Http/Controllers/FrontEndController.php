<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function accueil() {
        return view('pages.accueil');
    }


}
