<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Http\Requests\ReservationPaiementRequest;
use App\Statics\Views\interfaces\reservation_paiement\DonneesVueReservationPaiement;
use Illuminate\Http\Request;

class ReservationPaiementController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('paiement');
        $this->setDonneesStatiques(new DonneesVueReservationPaiement());
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

        return redirect(route('envoieEmail'));
    }

    static function anonymiserNumeroCarte($numeroCarte) {
        $numeroAnonyme = substr($numeroCarte, -4, 4);
        return "**** **** **** ".$numeroAnonyme;
    }
}
