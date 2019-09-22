<?php



namespace App\Http\Controllers;

use App\Statics\Views\DonneesVueGlobales;

use App\Statics\Views\interfaces\accueil\DonneesVueAccueil;
use App\Statics\Views\interfaces\choix_deux_options\pages\DonneesVueReservationChoixAutreVehicule;
use App\Statics\Views\interfaces\choix_deux_options\pages\DonneesVueReservationChoixRemorque;
use App\Statics\Views\interfaces\choix_deux_options\pages\DonneesVueReservationChoixVehicule;
use App\Statics\Views\interfaces\choix_deux_options\pages\DonneesVueReservationChoixVoiture;
use App\Statics\Views\interfaces\choix_deux_options\pages\DonneesVueReservationMatieres;
use App\Statics\Views\interfaces\choix_deux_options\pages\DonneesVueReservationPoids;
use App\Statics\Views\interfaces\choix_liste\pages\DonneesVueChoixDate;
use App\Statics\Views\interfaces\choix_liste\pages\DonneesVueChoixDepart;
use App\Statics\Views\interfaces\informations\pages\DonneesVueInformationsAnimaux;
use App\Statics\Views\interfaces\informations\pages\DonneesVueInformationsGenerales;
use App\Statics\Views\interfaces\informations\pages\DonneesVueInformationsMatieres;
use App\Statics\Views\interfaces\reservation_confirmation\DonneesVueReservationConfirmation;
use App\Statics\Views\interfaces\reservation_paiement\DonneesVueReservationPaiement;
use App\Statics\Views\interfaces\reservation_passagers\DonneesVueReservationPassagers;

use Illuminate\Http\Request;

define('REPERTOIRE_INTERFACES', 'interfaces');

class FrontEndController extends Controller
{
    private $donneesStatiquesGlobales;

    private $donneesStatiquesAccueil;
    private $donneesStatiquesReservationChoixAutreVehicule;
    private $donneesStatiquesReservationChoixRemorque;
    private $donneesStatiquesReservationChoixVehicule;
    private $donneesStatiquesReservationChoixVoiture;
    private $donneesStatiquesReservationMatieres;
    private $donneesStatiquesReservationPoids;
    private $donneesStatiquesChoixDate;
    private $donneesStatiquesChoixDepart;
    private $donneesStatiquesInformationsAnimaux;
    private $donneesStatiquesInformationsGenerales;
    private $donneesStatiquesInformationsMatieres;
    private $donneesStatiquesReservationConfirmation;
    private $donneesStatiquesReservationPaiement;
    private $donneesStatiquesReservationPassagers;


    public function __construct()
    {
        //Les donnees statiques de vues communes a plusieurs interfaces/pages
        $this->donneesStatiquesGlobales =
            (new DonneesVueGlobales())->getDonneesVue();

        //Donnees statiques des pages
        $this->donneesStatiquesAccueil = (new DonneesVueAccueil())->getDonneesVue();
        $this->donneesStatiquesReservationChoixAutreVehicule =
            (new DonneesVueReservationChoixAutreVehicule())->getDonneesVue();
        $this->donneesStatiquesReservationChoixRemorque =
            (new DonneesVueReservationChoixRemorque())->getDonneesVue();
        $this->donneesStatiquesReservationChoixVehicule =
            (new DonneesVueReservationChoixVehicule())->getDonneesVue();
        $this->donneesStatiquesReservationChoixVoiture =
            (new DonneesVueReservationChoixVoiture())->getDonneesVue();
        $this->donneesStatiquesReservationMatieres =
            (new DonneesVueReservationMatieres())->getDonneesVue();
        $this->donneesStatiquesReservationPoids =
            (new DonneesVueReservationPoids())->getDonneesVue();
        $this->donneesStatiquesChoixDate =
            (new DonneesVueChoixDate())->getDonneesVue();
        $this->donneesStatiquesChoixDepart =
            (new DonneesVueChoixDepart())->getDonneesVue();
        $this->donneesStatiquesInformationsAnimaux =
            (new DonneesVueInformationsAnimaux())->getDonneesVue();
        $this->donneesStatiquesInformationsGenerales =
            (new DonneesVueInformationsGenerales())->getDonneesVue();
        $this->donneesStatiquesInformationsMatieres =
            (new DonneesVueInformationsMatieres())->getDonneesVue();
        $this->donneesStatiquesReservationConfirmation =
            (new DonneesVueReservationConfirmation())->getDonneesVue();
        $this->donneesStatiquesReservationPaiement =
            (new DonneesVueReservationPaiement())->getDonneesVue();
        $this->donneesStatiquesReservationPassagers =
            (new DonneesVueReservationPassagers())->getDonneesVue();
    }

    public function accueil(Request $request) {
        return $this->getVue($request,'accueil',
            $this->donneesStatiquesAccueil);
    }

    public function choixDate(Request $request) {
        $donneesDynamiquesChoixDate = [];
        $donneesDynamiquesChoixDate['type_information'] = 'jour';
        $donneesDynamiquesChoixDate['tab_items'] = [
          ['valeur' => '4',
              'contenu' => '4 Septembre'],
          ['valeur' => '5',
              'contenu' => '5 Septembre'],
          ['valeur' => '6',
              'contenu' => '6 Septembre'],
        ];
        return $this->getVue($request,'choix_liste',
            $this->donneesStatiquesChoixDate,
            $donneesDynamiquesChoixDate);
    }

    public function choixDepart(Request $request) {
        $donneesDynamiquesChoixDepart = [];
        $donneesDynamiquesChoixDepart['type_information'] = 'depart';
        $donneesDynamiquesChoixDepart['tab_items'] = [
            ['valeur' => 'matane',
                'contenu' => 'Matane'],
            ['valeur' => 'baie_comeau',
                'contenu' => 'Baie Comeau'],
            ['valeur' => 'godbout',
                'contenu' => 'Godbout'],
        ];
        return $this->getVue($request,'choix_liste',
            $this->donneesStatiquesChoixDepart,
            $donneesDynamiquesChoixDepart);
    }

    public function reservationChoixAutreVehicule(Request $request) {
        return $this->getVue($request,'choix_deux_options',
            $this->donneesStatiquesReservationChoixAutreVehicule);
    }

    public function reservationChoixRemorque(Request $request) {
        return $this->getVue($request,
            'choix_deux_options',
            $this->donneesStatiquesReservationChoixRemorque);
    }

    public function reservationChoixVehicule(Request $request) {
        if (!isset($_GET['destination']) or !isset($_GET['heure'])) {
            return redirect()->route('index');
        }
        $request->session()->put('destination', htmlspecialchars($_GET['destination']));
        $request->session()->put('heure', htmlspecialchars($_GET['heure']));
        return $this->getVue($request,
            'choix_deux_options',
            $this->donneesStatiquesReservationChoixVehicule);
    }

    public function reservationChoixVoiture(Request $request) {
        return $this->getVue($request,
            'choix_deux_options',
            $this->donneesStatiquesReservationChoixVoiture);
    }

    public function reservationMatieres(Request $request) {
        $poidsEleve = $this->estDerniereURL($request, 'reservation_poids') && $_GET['dernierChoix'] == 1;
        $request->session()->put('poids_eleve', $poidsEleve);
        return $this->getVue($request,'choix_deux_options',
            $this->donneesStatiquesReservationMatieres);
    }

    public function reservationPoids(Request $request) {
        if ($this->estDerniereURL($request, 'reservation_choix_remorque')) {
            if ($_GET['dernierChoix'] == 1) {
                $request->session()->put('type_vehicule', 'Voiture avec remorque');
            }
            else {
                $request->session()->put('type_vehicule', 'Voiture');
            }
        }
        else if ($this->estDerniereURL($request, 'reservation_choix_autre_vehicule')) {
            if ($_GET['dernierChoix'] == 1) {
                $request->session()->put('type_vehicule', 'Camionette');
            }
            else {
                $request->session()->put('type_vehicule', 'Poids lourd');
            }
        }
        return $this->getVue($request,'choix_deux_options',
            $this->donneesStatiquesReservationPoids);
    }

    public function informations(Request $request) {
        return $this->getVue($request,'informations',
            $this->donneesStatiquesInformationsGenerales);
    }

    public function informationsAnimaux(Request $request) {
        return $this->getVue($request,'informations',
            $this->donneesStatiquesInformationsAnimaux);
    }

    public function informationsMatieres(Request $request) {
        return $this->getVue($request,'informations',
            $this->donneesStatiquesInformationsMatieres);
    }

    public function reservationConfirmation(Request $request) {
        return $this->getVue($request,'reservation_confirmation',
            $this->donneesStatiquesReservationConfirmation);
    }

    public function reservationPaiement(Request $request) {
        return $this->getVue($request,'reservation_paiement',
            $this->donneesStatiquesReservationPaiement);
    }

    public function reservationPassagers(Request $request) {
        if ($this->estDerniereURL($request, 'reservation_choix_vehicule') && $_GET["dernierChoix"] == 2) {
            $request->session()->put('type_vehicule', 'Pieton');
            $request->session()->put('poids_eleve', false);
        }


        $destination = $request->session()->get('destination');
        $heureDepart = $request->session()->get('heure');
        $typeVehicule = $request->session()->get('type_vehicule');
        $chargeEleve = '';
        if ($request->session()->get('charge_eleve'))
            $chargeEleve = 'Oui';
        else
            $chargeEleve = 'Non';

        $donneesDynamiquesReservationPassagers = [
            'destination'=>$destination,
            'heure'=>$heureDepart,
            'type_vehicule'=>$typeVehicule,
            'poids_eleve'=>$chargeEleve
        ];

        //dd($request->session()->all();
        return $this->getVue($request,'reservation_passagers',
            $this->donneesStatiquesReservationPassagers,
            $donneesDynamiquesReservationPassagers);
    }

    private function getVue(Request $request, $interface, $donneesStatiquesLocals = [], $donneesDynamiques = []) {
        $request->session()->put('derniere_URL', $interface);
        $donneesVue = array_merge($this->donneesStatiquesGlobales, $donneesStatiquesLocals, $donneesDynamiques);
        return view(REPERTOIRE_INTERFACES . '.' . $interface . '.' . $interface, $donneesVue);
    }

    private function estDerniereURL(Request $request, $chaine) {
        return $request->session()->get('derniere_URL') == $chaine;
    }
}
