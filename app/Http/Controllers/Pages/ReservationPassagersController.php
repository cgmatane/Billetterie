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
        $this->setDonneesStatiques(new DonneesVueReservationPassagers(0));
    }

    public function gererValidation(Request $requete)
    {
        if ($requete->session()->get('ticket.type_vehicule') == null) {
            $validatedData = $this->validate($requete, [
                'mail' => 'required|email',
                'numero' => 'required',
                'nom.*' => 'required',
                'prenom.*' => 'required',
                'age.*' => 'required',
            ]);
        }else {
            $validatedData = $this->validate($requete, [
                'mail' => 'required|email',
                'numero' => 'required',
                'nom.*' => 'required',
                'prenom.*' => 'required',
                'age.*' => 'required',
                'immatriculation' => 'required',
                'marqueVehicule' => 'required',
                'couleurVehicule' => 'required',
            ]);
            $requete->session()->put('ticket.immatriculation', $validatedData['immatriculation']);
            $requete->session()->put('ticket.couleurVehicule', $validatedData['couleurVehicule']);
            $requete->session()->put('ticket.marqueVehicule', $validatedData['marqueVehicule']);
        }

        $requete->session()->put('ticket.noms', $validatedData['nom']);
        $requete->session()->put('ticket.prenoms', $validatedData['prenom']);
        $requete->session()->put('ticket.ages', $validatedData['age']);

        $requete->session()->put('ticket.mail', $validatedData['mail']);
        $requete->session()->put('ticket.numero', $validatedData['numero']);

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
            'reservation_passagers_couleur_vehicule' => 'Couleur du véhicule', //TODO Remplacer par vrais statiques (je ne touche pas aux statiques pr l'instant vu que Loïc est en train de refactor
            'reservation_passagers_marque_vehicule' => 'Marque du véhicule',
        ];
    }
}
