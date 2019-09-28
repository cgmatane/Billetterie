<?php


namespace App\Http\Controllers\Auth\pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\choix_deux_options\pages\DonneesVueReservationChoixRemorque;

class ReservationChoixRemorqueController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('remorque');
        $this->setDonneesStatiques(new DonneesVueReservationChoixRemorque());
    }
}
