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
        if(null != $requete->session()->get('dernier_scan')) {
            $billet_scan = $requete->session()->get('dernier_scan');
        } else {
            $billet_scan = "Pas de billet scanné";
        }

        $billet_parse = json_decode($billet_scan, true);
        $passagers = $billet_parse["relation_passagers"];
        $nombre_passagers = count($passagers);
        

        $this->donneesDynamiques = [
            'email'=>$email,
            'json_billet'=>$billet_scan,
            'passagers'=>$passagers,
            'nombre_passagers'=>$nombre_passagers,
        ];
    }

}
