<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class LangueController extends Controller
{
    function setCookie(Request $requete) {
        return Redirect::to($requete->input('provenance'))->withCookie('langue',$requete->input('langue'),86400*30);
    }
}
