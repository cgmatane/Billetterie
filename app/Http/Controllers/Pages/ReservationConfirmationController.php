<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\reservation_confirmation\DonneesVueReservationConfirmation;
use Illuminate\Http\Request;

class ReservationConfirmationController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('confirmation');
        $this->setDonneesStatiques(new DonneesVueReservationConfirmation(FrontEndController::$langueCourante));
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
        $email = $requete->session()->get('ticket.email');
        $codeQR = $requete->session()->get('ticket.QR');
        $imageQR = "https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=" . $codeQR;
        $requete->session()->put("ticket.imageQR", $imageQR);
        $this->donneesDynamiques = [
            'email'=>$email,
            'codeQR'=>$codeQR,
            'imageQR'=>$imageQR,
        ];
    }
}
