<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Http\Requests\ReservationPassagerRequest;
use App\Statics\Views\interfaces\reservation_passagers\DonneesVueReservationPassagers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReservationPassagersController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('passagers');
        $this->setDonneesStatiques(new DonneesVueReservationPassagers());
    }

    public function gererValidation(Request $requete)
    {
        $validatedData = $this->validate($requete, [
            'email' => 'required|email',
            'numero' => 'required',
            'nom.*' => 'required',
            'prenom.*' => 'required',
            'age.*' => 'required',
        ]);

        $requete->session()->put('ticket.noms', $validatedData['nom']);
        $requete->session()->put('ticket.prenoms', $validatedData['prenom']);
        $requete->session()->put('ticket.ages', $validatedData['age']);

        $requete->session()->put('ticket.email', $validatedData['email']);
        $requete->session()->put('ticket.numero', $validatedData['numero']);

        return redirect(route('validation_informations'));
    }


    protected function setDonneesDynamiques(Request $requete = null)
    {
        $destination = $requete->session()->get('destination');
        $heureDepart = $requete->session()->get('heure');
        $typeVehicule = $requete->session()->get('type_vehicule');
        $chargeEleve = '';
        if ($requete->session()->get('charge_eleve'))
            $chargeEleve = 'Oui';
        else
            $chargeEleve = 'Non';

        $this->donneesDynamiques = [
            'destination'=>$destination,
            'heure'=>$heureDepart,
            'type_vehicule'=>$typeVehicule,
            'poids_eleve'=>$chargeEleve
        ];
    }


}
