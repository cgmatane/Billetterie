<?php


namespace App\Http\Controllers\Auth\pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\reservation_paiement\DonneesVueReservationPaiement;

class ReservationPaiementController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('paiement');
        $this->setDonneesStatiques(new DonneesVueReservationPaiement());
    }
}
