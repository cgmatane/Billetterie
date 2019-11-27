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
use App\Scan;
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
        
        $dernier_scan = Scan::getScanCourant();
        $passagers_raw = $dernier_scan->relation_passagers;
        $passagers = json_decode($passagers_raw, true);
        $nombre_passagers = count($passagers);

        $vehicule = json_decode($dernier_scan->relation_vehicule, true);
    
        

        $this->donneesDynamiques = [
            'email'=>$email,
            'passagers'=>$passagers,
            'nombre_passagers'=>$nombre_passagers,
            'vehicule'=>$vehicule,
        ];
    }

}
