<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\reservation_confirmation\DonneesVueReservationConfirmation;

class ReservationConfirmationController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('confirmation');
        $this->setDonneesStatiques(new DonneesVueReservationConfirmation());
    }
}
