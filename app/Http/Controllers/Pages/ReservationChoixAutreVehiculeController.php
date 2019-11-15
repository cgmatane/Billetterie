<?php


namespace App\Http\Controllers\Pages;
use App\Http\Controllers\FrontEndController;
use App\TypeVehicule;
use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\choix_deux_options\pages\DonneesVueReservationChoixAutreVehicule;
use Illuminate\Http\Request;

class ReservationChoixAutreVehiculeController extends PageController
{
    const CHOIX_CAMIONETTE = 1;
    const CHOIX_POIDS_LOURD = 2;

    public function __construct() {
        parent::__construct();
        $this->setNomPage('autre_vehicule');
        $this->setDonneesStatiques(new DonneesVueReservationChoixAutreVehicule(FrontEndController::$langueCourante));
    }

    public function gererValidation(Request $requete)
    {
        $dernierChoix = $requete->input('dernierChoix');

        switch($dernierChoix) {
            case self::CHOIX_CAMIONETTE:
                $requete->session()->put('ticket.type_vehicule', TypeVehicule::CAMIONETTE);
                break;
            case self::CHOIX_POIDS_LOURD:
                $requete->session()->put('ticket.type_vehicule', TypeVehicule::POIDS_LOURD);
                break;
        }
        return redirect(route('reservation_poids'));
    }

}
