<?php

namespace App\Http\Controllers\Pages;


use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\PageController;
use App\Navire;
use App\Passager;
use App\Statics\Views\interfaces\gardien\DonneesVueGardien;
use App\Station;
use App\Ticket;
use App\Trajet;
use App\Vehicule;
use Illuminate\Http\Request;

class GardienController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('administration/gardien');
        $this->setDonneesStatiques(new DonneesVueGardien(FrontEndController::$langueCourante));
    }

    /* Methode appelee quand la requete vers la page contient des variables GET/POST */
    public function gererValidation(Request $requete)
    {

    }

    /* Set un tableau associatif à passer à la template blade */
    protected function setDonneesDynamiques(Request $requete = null)
    {
        $email = $requete->session()->get('utilisateur.email');

        $this->donneesDynamiques = [
            'email'=>$email,
            'exemple_donnee_dynamique'=>"Donnée dynamique exemple",
        ];
    }

}
