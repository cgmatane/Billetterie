<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\reservation_passagers\DonneesVueReservationPassagers;
use Illuminate\Http\Request;

class ReservationPassagersController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('passagers');
        $this->setDonneesStatiques(new DonneesVueReservationPassagers());
    }

    public function gererSession(Request $requete)
    {
        if ($requete->session()->get('derniere_URL') == 'reservation_choix_vehicule' && $_GET["dernierChoix"] == 2) {
            $requete->session()->put('type_vehicule', 'Piéton');
            $requete->session()->put('poids_eleve', false);
        }
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
        $destination = $requete->session()->get('destination');
        $heureDepart = $requete->session()->get('heure');
        $typeVehicule = $requete->session()->get('type_vehicule');
        $chargeEleve = '';
        if ($requete->session()->get('charge_eleve'))
            $chargeEleve = 'Oui';
        else
            $chargeEleve = 'Non';

        $this->donneesDynamiques = [
            'destination'=>$destination,
            'heure'=>$heureDepart,
            'type_vehicule'=>$typeVehicule,
            'poids_eleve'=>$chargeEleve
        ];
    }


}
