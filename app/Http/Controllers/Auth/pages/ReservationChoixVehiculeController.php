<?php


namespace App\Http\Controllers\Auth\pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\choix_deux_options\pages\DonneesVueReservationChoixVehicule;
use Illuminate\Http\Request;

class ReservationChoixVehiculeController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('vehicule');
        $this->setDonneesStatiques(new DonneesVueReservationChoixVehicule());
    }

    public function gererSession(Request $requete)
    {
        if (!isset($_GET['destination']) or !isset($_GET['heure'])) {
            return redirect()->route('index');
        }
        $requete->session()->put('destination', htmlspecialchars($_GET['destination']));
        $requete->session()->put('heure', htmlspecialchars($_GET['heure']));
        return null;
    }
}
