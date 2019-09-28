<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\choix_deux_options\pages\DonneesVueReservationMatieres;
use Illuminate\Http\Request;

class ReservationMatieresController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('matieres');
        $this->setDonneesStatiques(new DonneesVueReservationMatieres());
    }

    public function gererSession(Request $requete) {
        $poidsEleve = $requete->session()->get('derniere_URL') == 'reservation_poids' && $_GET['dernierChoix'] == 1;
        $requete->session()->put('poids_eleve', $poidsEleve);
        return null;
    }

}
