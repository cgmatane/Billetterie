<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\reservation_confirmation\DonneesVueReservationConfirmation;
use Illuminate\Http\Request;

class ReservationConfirmationController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('confirmation');
        $this->setDonneesStatiques(new DonneesVueReservationConfirmation());
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
        $email = $requete->session()->get('ticket.email');
        $this->donneesDynamiques = [
            'email'=>$email,
        ];
    }
}
