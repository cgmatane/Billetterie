<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Http\Requests\ReservationPassagerRequest;
use App\Statics\Views\interfaces\reservation_passagers\DonneesVueReservationPassagers;
use App\Ticket;
use App\TypeVehicule;
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
        if ($requete->session()->get('ticket.type_vehicule') == null ) {
            $validatedData = $this->validate($requete, [
                'mail' => 'required|email',
                'numero' => 'required',
                'nom.*' => 'required',
                'prenom.*' => 'required',
                'age.*' => 'required',
            ]);
        }else{
            $validatedData = $this->validate($requete, [
                'mail' => 'required|email',
                'numero' => 'required',
                'nom.*' => 'required',
                'prenom.*' => 'required',
                'age.*' => 'required',
                'immatriculation' => 'required',
            ]);
            $requete->session()->put('ticket.immatriculation', $validatedData['immatriculation']);
        }

        $codeQR = Ticket::genererCodeQR();
        $requete->session()->put('ticket.QR', $codeQR);
        $requete->session()->put('ticket.noms', $validatedData['nom']);
        $requete->session()->put('ticket.prenoms', $validatedData['prenom']);
        $requete->session()->put('ticket.ages', $validatedData['age']);

        $requete->session()->put('ticket.mail', $validatedData['mail']);
        $requete->session()->put('ticket.numero', $validatedData['numero']);


        $imageQR = "https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=" . $codeQR;
        $requete->session()->put("ticket.imageQR", $imageQR);


        return redirect(route('validation_informations'));
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
        switch($requete->session()->get('ticket.type_vehicule')) {
            case TypeVehicule::PIETON:
                $typeVehicule = null;
                break;
            case TypeVehicule::VOITURE:
                $typeVehicule = "Voiture";
                break;
            case TypeVehicule::VOITURE_AVEC_REMORQUE:
                $typeVehicule = "Voiture avec remorque";
                break;
            case TypeVehicule::CAMIONETTE:
                $typeVehicule = "Camionette";
                break;
            case TypeVehicule::POIDS_LOURD:
                $typeVehicule = "Poids lourd";
                break;
            default :
                $typeVehicule = "pas de véhicule";
                break;
        }

        $this->donneesDynamiques = [
            'type_vehicule'=>$typeVehicule,
        ];
    }
}
