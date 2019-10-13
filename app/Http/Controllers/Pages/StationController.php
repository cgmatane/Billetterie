<?php

namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\station\DonneesVueStation;
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
        $this->donneesDynamiques = [
            'email'=>$email
        ];
    }

}
