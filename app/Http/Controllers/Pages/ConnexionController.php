<?php

namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;

use App\Statics\Views\interfaces\connexion\DonneesVueConnexion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('connexion');
        $this->setDonneesStatiques(new DonneesVueConnexion());
    }

    public function gererValidation(Request $requete)
    {
        $messages = [
            'email.required' => 'Le champ courriel n\'est pas rempli' ,
            'email.email' => 'Le courriel n\'est pas valide' ,
            'password.required' => 'Le champ mot de passe n\'est pas rempli' ,
            'password.min' => 'Le champ mot de passe doit faire au minimum 3 caractères' ,
        ];
        $this->validate($requete,[
            'email' =>  'required|email',
            'password'  => 'required|min:3'
        ],$messages);

        $user_data = array(
            'email' => htmlentities($requete->get('email')),
            'password'  => htmlentities($requete->get('password'))
        );

        if (Auth::attempt($user_data)){
            return redirect('/administration');
        }else{
            return back()->with('error','Les identifiants sont incorrect');
        }
    }


}
