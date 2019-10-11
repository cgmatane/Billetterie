<?php

namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\administration\DonneesVueAdministration;
use Illuminate\Http\Request;

class AdministrationController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('administration');
        $this->setDonneesStatiques(new DonneesVueAdministration());
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
        $email = $requete->session()->get('utilisateur.email');
        $this->donneesDynamiques = [
            'email'=>$email
        ];
    }

}
