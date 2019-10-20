<?php

namespace App\Http\Controllers\Pages;

use App;
use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\administration\DonneesVueTrajet;
use Illuminate\Http\Request;

class TrajetController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('administration/trajet');
        $this->setDonneesStatiques(new DonneesVueTrajet());
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
        $email = $requete->session()->get('utilisateur.email');
        $valeurs = App\Trajet::all();
        $this->donneesDynamiques = [
            'email'=>$email,
            'valeurs'=>$valeurs
        ];
    }

}
