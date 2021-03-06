<?php

namespace App\Http\Controllers\Pages;


use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\administration\DonneesVueAdministration;
use Illuminate\Http\Request;

class AdministrationController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('administration');
        $this->setDonneesStatiques(new DonneesVueAdministration(FrontEndController::$langueCourante));
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
        $email = $requete->session()->get('utilisateur.email');
        $this->donneesDynamiques = [
            'email'=>$email,
        ];
    }

}
