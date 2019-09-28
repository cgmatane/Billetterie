<?php


namespace App\Http\Controllers\Auth\pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\choix_deux_options\pages\DonneesVueReservationPoids;
use Illuminate\Http\Request;

class ReservationPoidsController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('poids');
        $this->setDonneesStatiques(new DonneesVueReservationPoids());
    }

    public function gererSession(Request $requete)
    {
        if ($requete->session()->get('derniere_URL') == 'reservation_choix_remorque') {
            if ($_GET['dernierChoix'] == 1) {
                $requete->session()->put('type_vehicule', 'Voiture avec remorque');
            }
            else {
                $requete->session()->put('type_vehicule', 'Voiture');
            }
        }
        if ($requete->session()->get('derniere_url') == 'reservation_choix_autre_vehicule') {
            if ($_GET['dernierChoix'] == 1) {
                $requete->session()->put('type_vehicule', 'Camionette');
            }
            else {
                $requete->session()->put('type_vehicule', 'Poids lourd');
            }
        }
    }
}
