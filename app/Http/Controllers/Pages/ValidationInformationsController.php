<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\validation_informations\DonneesVueValidationInformations;
use App\Trajet;
use App\TypeVehicule;
use Illuminate\Http\Request;

class ValidationInformationsController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('validation');

        $this->setDonneesStatiques(new DonneesVueValidationInformations(0));
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
        $date = $requete->session()->get('ticket.date');
        $trajet = Trajet::find($requete->session()->get('ticket.trajet'));
        $heure = $trajet->date_depart;
        $depart = $trajet->stationDepart()->nom;
        $arrivee = $trajet->stationArrivee()->nom;
        $noms = $requete->session()->get('ticket.noms');
        $prenoms = $requete->session()->get('ticket.prenoms');
        $ages = $requete->session()->get('ticket.ages');
        $mail = $requete->session()->get('ticket.mail');
        $numero = $requete->session()->get('ticket.numero');
        $poidsEleve = $requete->session()->get('ticket.poids_eleve');
        $immatriculation = $requete->session()->get('ticket.immatriculation');
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
                break;
            default :
                $typeVehicule = "pas de véhicule";
                break;
        }

        $this->donneesDynamiques = [
            'type_vehicule'=>$typeVehicule,
            'date'=>$date,
            'heure'=>$heure,
            'depart'=>$depart,
            'arrivee'=>$arrivee,
            'noms'=>$noms,
            'prenoms'=>$prenoms,
            'ages'=>$ages,
            'mail'=>$mail,
            'numero'=>$numero,
            'poids_eleve'=>$poidsEleve,
            'immatriculation'=>$immatriculation,
        ];
    }

}
