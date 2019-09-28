<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\choix_deux_options\pages\DonneesVueReservationChoixAutreVehicule;

class ReservationChoixAutreVehiculeController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('autre_vehicule');
        $this->setDonneesStatiques(new DonneesVueReservationChoixAutreVehicule());
    }
}
