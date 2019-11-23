<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\PageController;
use App\IntervalleAge;
use App\Statics\Views\interfaces\reservation_passagers\DonneesVueReservationPassagers;
use Illuminate\Support\Facades\Auth;
use App\TypeVehicule;
use Illuminate\Http\Request;

class ReservationPassagersController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('passagers');
        $this->setDonneesStatiques(new DonneesVueReservationPassagers(FrontEndController::$langueCourante));
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

        if ($requete->input('commentaires') != null && Auth::id() != null)
            $commentaires = $requete->input('commentaires');
        else
            $commentaires = "N/A";
        $requete->session()->put('ticket.commentaires', $commentaires);

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

        $intervallesAge = IntervalleAge::all();

        $intervallesAgeVue = array();
        for ($i = 0;$i<count($intervallesAge);$i++) {
            $intervalleAgeVue = array();
            $intervalleAgeVue['id'] = $intervallesAge[$i]->id_intervalle_age;
            $intervalleAgeVue['age_min'] = $intervallesAge[$i]->age_min;
            $intervalleAgeVue['age_max'] = $intervallesAge[$i]->age_max;
            array_push($intervallesAgeVue, $intervalleAgeVue);
        }

        $estAdministrateur = Auth::id() != null;
        $this->donneesDynamiques = [
            'type_vehicule'=>$typeVehicule,
            'intervalles_age'=>$intervallesAgeVue,
            'est_admin'=>$estAdministrateur,
        ];
    }
}
