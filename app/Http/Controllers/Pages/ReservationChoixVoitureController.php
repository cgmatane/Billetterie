<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\choix_deux_options\pages\DonneesVueReservationChoixVoiture;

class ReservationChoixVoitureController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('voiture');
        $this->setDonneesStatiques(new DonneesVueReservationChoixVoiture());
    }
}
