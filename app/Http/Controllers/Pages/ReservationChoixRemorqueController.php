<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\choix_deux_options\pages\DonneesVueReservationChoixRemorque;
use App\TypeVehicule;
use Illuminate\Http\Request;

class ReservationChoixRemorqueController extends PageController
{
    const CHOIX_VOITURE_AVEC_REMORQUE = 1;
    const CHOIX_VOITURE_SANS_REMORQUE = 2;

    public function __construct() {
        parent::__construct();
        $this->setNomPage('remorque');
        $this->setDonneesStatiques(new DonneesVueReservationChoixRemorque());
    }

    public function gererValidation(Request $requete)
    {
        $dernierChoix = $requete->input('dernierChoix');
        switch($dernierChoix) {
            case self::CHOIX_VOITURE_AVEC_REMORQUE:
                $requete->session()->put('ticket.type_vehicule', TypeVehicule::VOITURE_AVEC_REMORQUE);
                break;
            case self::CHOIX_VOITURE_SANS_REMORQUE:
                $requete->session()->put('ticket.type_vehicule', TypeVehicule::VOITURE);
                break;
        }
        return redirect(route('reservation_poids'));
    }

}
