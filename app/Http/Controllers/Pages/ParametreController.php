<?php

namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\parametre\DonneesVueParametre;
use Illuminate\Http\Request;

class ParametreController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('administration/parametre');
        $this->setDonneesStatiques(new DonneesVueParametre());
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
        $email = $requete->session()->get('utilisateur.email');
        $this->donneesDynamiques = [
            'email'=>$email
        ];
    }

}
