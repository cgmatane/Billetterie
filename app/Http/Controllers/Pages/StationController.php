<?php

namespace App\Http\Controllers\Pages;

use App;
use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\administration\DonneesVueStation;
use Illuminate\Http\Request;

class StationController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('administration/station');
        $this->setDonneesStatiques(new DonneesVueStation());
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
        $email = $requete->session()->get('utilisateur.email');
        $valeurs = App\Station::all();
        $this->donneesDynamiques = [
            'email'=>$email,
            'valeurs'=>$valeurs
        ];
    }

}
