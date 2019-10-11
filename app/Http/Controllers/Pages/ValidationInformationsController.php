<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\validation_informations\DonneesVueValidationInformations;
use App\TypeVehicule;
use Illuminate\Http\Request;

class ValidationInformationsController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('validation');

        $this->setDonneesStatiques(new DonneesVueValidationInformations());
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
        $date = $requete->session()->get('ticket.date');
        $heure = $requete->session()->get('ticket.heure');
        $depart = $requete->session()->get('ticket.depart');
        $destination = $requete->session()->get('ticket.destination');
        $noms = $requete->session()->get('ticket.noms');
        $prenoms = $requete->session()->get('ticket.prenoms');
        $ages = $requete->session()->get('ticket.ages');
        $email = $requete->session()->get('ticket.email');
        $numero = $requete->session()->get('ticket.numero');
        $poidsEleve = $requete->session()->get('ticket.poids_eleve');
        switch($requete->session()->get('ticket.type_vehicule')) {
            case TypeVehicule::PIETON:
                $typeVehicule = null;
                break;
            case TypeVehicule::VOITURE:
                $typeVehicule = "Voiture";
                break;
            case TypeVehicule::VOITURE_AVEC_REMORQUE:
                $typeVehicule = "Voiture avec remorque";
                break;
            case TypeVehicule::CAMIONETTE:
                $typeVehicule = "Camionette";
                break;
            case TypeVehicule::POIDS_LOURD:
                $typeVehicule = "Poids lourd";
        }

        $this->donneesDynamiques = [
            'type_vehicule'=>$typeVehicule,
            'date'=>$date,
            'heure'=>$heure,
            'depart'=>$depart,
            'destination'=>$destination,
            'noms'=>$noms,
            'prenoms'=>$prenoms,
            'ages'=>$ages,
            'email'=>$email,
            'numero'=>$numero,
            'poids_eleve'=>$poidsEleve,
        ];
    }

}
