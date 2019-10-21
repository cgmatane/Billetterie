<?php

namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;

use App;
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
        $valeurs = App\Programmation::all();
        $this->donneesDynamiques = [
            'email'=>$email,
            'valeurs'=>$valeurs,
            'attributs' => [
                'id_programmation',
                'nom',
                'date_depart',
                'date_arrivee',
                'annulation'
            ]
        ];
    }

}
