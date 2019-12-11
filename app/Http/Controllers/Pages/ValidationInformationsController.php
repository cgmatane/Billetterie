<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\PageController;
use App\IntervalleAge;
use App\Statics\Views\interfaces\validation_informations\DonneesVueValidationInformations;
use App\Trajet;
use App\TypeVehicule;
use App\Vehicule;
use Illuminate\Http\Request;

class ValidationInformationsController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('validation');

        $this->setDonneesStatiques(new DonneesVueValidationInformations(FrontEndController::$langueCourante));
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
        $date = $requete->session()->get('ticket.date');
        $trajet = Trajet::find($requete->session()->get('ticket.trajet'));
        $depart = $trajet->stationDepart()->nom;
        $dateDepart = date('d/m/Y H\hi',strtotime($trajet->date_depart));
        $arrivee = $trajet->stationArrivee()->nom;
        $dateArrivee = date('d/m/Y H\hi',strtotime($trajet->date_arrivee));
        $noms = $requete->session()->get('ticket.noms');
        $prenoms = $requete->session()->get('ticket.prenoms');
        $intervalles_age = $requete->session()->get('ticket.ages');
        $ages = [];
        $tarifsPassagers = [];
        foreach ($intervalles_age as $intervalle_age) {
            $age = IntervalleAge::find($intervalle_age);
            array_push($ages, ['age_min'=>$age->age_min, 'age_max'=>$age->age_max]);
            array_push($tarifsPassagers, $age->tarif);
        }
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
        $tarifVehicule = 0;
        if ($requete->session()->get('ticket.type_vehicule')) {
            $tarifVehicule += TypeVehicule::find($requete->session()->get('ticket.type_vehicule'))->tarif;
            if ($requete->session()->get('poids_eleve'))
                $tarifVehicule += Vehicule::SUPPLEMENT_POIDS_ELEVE;
        }

        $prix = 0;

        foreach($tarifsPassagers as $tarifPassager) {
            $prix += $tarifPassager;
        }
        $prix += $tarifVehicule;

        $requete->session()->put('ticket.prix', $prix);

        $this->donneesDynamiques = [
            'prix'=>$prix,
            'type_vehicule'=>$typeVehicule,
            'depart'=>$depart,
            'date_depart'=>$dateDepart,
            'arrivee'=>$arrivee,
            'date_arrivee'=>$dateArrivee,
            'noms'=>$noms,
            'prenoms'=>$prenoms,
            'ages'=>$ages,
            'tarifs_passagers'=>$tarifsPassagers,
            'mail'=>$mail,
            'numero'=>$numero,
            'poids_eleve'=>$poidsEleve,
            'immatriculation'=>$immatriculation,
            'tarif_vehicule'=>$tarifVehicule,
        ];
    }

}
