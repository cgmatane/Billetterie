<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\choix_deux_options\pages\DonneesVueReservationChoixVoiture;
use Illuminate\Http\Request;

class ReservationChoixVoitureController extends PageController
{
    const CHOIX_VOITURE = 1;
    const CHOIX_AUTRE_VEHICULE = 2;

    public function __construct() {
        parent::__construct();
        $this->setNomPage('voiture');
        $this->setDonneesStatiques(new DonneesVueReservationChoixVoiture(0));
    }

    public function gererValidation(Request $requete)
    {
        $dernierChoix = $requete->input('dernierChoix');
        switch($dernierChoix) {
            case self::CHOIX_VOITURE:
                return redirect(route('reservation_choix_remorque'));
                break;
            case self::CHOIX_AUTRE_VEHICULE:
                return redirect(route('reservation_choix_autre_vehicule'));
                break;
        }
    }

}
