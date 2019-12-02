<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\choix_deux_options\pages\DonneesVueReservationPoids;
use App\Vehicule;
use Illuminate\Http\Request;

class ReservationPoidsController extends PageController
{
    const CHOIX_POIDS_LOURD = 1;
    const CHOIX_POIDS_NON_LOURD = 2;

    public function __construct() {
        parent::__construct();
        $this->setNomPage('poids');
        $this->setDonneesStatiques(new DonneesVueReservationPoids(FrontEndController::$langueCourante));
    }

    public function gererValidation(Request $requete)
    {
        $dernierChoix = $requete->input('dernierChoix');
        switch($dernierChoix) {
            case self::CHOIX_POIDS_LOURD:
                $requete->session()->put('ticket.poids_eleve', true);
                break;
            case self::CHOIX_POIDS_NON_LOURD:
                $requete->session()->put('ticket.poids_eleve', false);
                break;
        }
        return redirect(route('reservation_passagers'));
    }
}
