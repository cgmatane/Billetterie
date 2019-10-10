<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\choix_deux_options\pages\DonneesVueReservationChoixVehicule;
use Illuminate\Http\Request;

class ReservationChoixVehiculeController extends PageController
{
    const CHOIX_VEHICULE = 1;
    const CHOIX_PIETON = 2;


    public function __construct() {
        parent::__construct();
        $this->setNomPage('vehicule');
        $this->setDonneesStatiques(new DonneesVueReservationChoixVehicule());
    }

    public function gererValidation(Request $requete)
    {
        $dernierChoix = $requete->input('dernierChoix');
        switch($dernierChoix) {
            case self::CHOIX_VEHICULE:
                return redirect(route('reservation_choix_voiture'));
                break;
            case self::CHOIX_PIETON:
                $requete->session()->put('ticket.typeVehicule', 'piéton');
                return redirect(route('reservation_passagers'));
                break;
        }
        return null;
    }
}
