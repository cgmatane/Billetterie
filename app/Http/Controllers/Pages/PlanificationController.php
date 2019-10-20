<?php

namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;

use App\Statics\Views\interfaces\administration\DonneesVuePlanification;
use Illuminate\Http\Request;

class PlanificationController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('administration/planification');
        $this->setDonneesStatiques(new DonneesVuePlanification());
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
        $email = $requete->session()->get('utilisateur.email');
        $this->donneesDynamiques = [
            'email'=>$email
        ];
    }

}
