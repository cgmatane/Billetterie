<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\PageController;
use App\Http\Requests\ReservationPaiementRequest;
use App\Statics\Views\interfaces\reservation_paiement\DonneesVueReservationPaiement;
use Illuminate\Http\Request;

class ReservationPaiementController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('paiement');
        $this->setDonneesStatiques(new DonneesVueReservationPaiement(FrontEndController::$langueCourante));
    }

    public function gererValidation(Request $requete) {
        $validatedData = $this->validate($requete, [
            'number' => 'required',
            'name' => 'required',
            'expiry' => 'required',
            'cvc' => 'required',
        ]);

        $requete->session()->put('paiement.carte', self::anonymiserNumeroCarte($validatedData['number']));
        $requete->session()->put('paiement.nom', $validatedData['name']);
        date_default_timezone_set("America/New_York");
        $requete->session()->put('paiement.date', date('Y/m/d H:i:s'));
        return redirect(route('gerant_reservation'));
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
        $prix = $requete->session()->get('ticket.prix');
        $this->donneesDynamiques = [
            'prix' => $prix,
        ];
    }

    static function anonymiserNumeroCarte($numeroCarte) {
        $numeroAnonyme = substr($numeroCarte, -4, 4);
        return "**** **** **** ".$numeroAnonyme;
    }
}
