<?php

namespace App\Http\Controllers;

use App\Statics\Views\DonneesVueAccueil;
use App\Statics\Views\DonneesVueNav;
use Illuminate\Http\Request;

define('REPERTOIRE_INTERFACES', 'interfaces');
define('SOUS_REPERTOIRE_PAGES', 'pages');

class FrontEndController extends Controller
{
    private $donneesVueGlobal;

    private $donneesVueNav;

    private $donneesVueAccueil;

    public function __construct()
    {
        //Les donnees statiques de vues communes a toutes les interfaces
        $this->donneesVueGlobal = [];

        $this->donneesVueNav = (new DonneesVueNav())->getDonneesVue();

        $this->donneesVueAccueil = (new DonneesVueAccueil())->getDonneesVue();

        $this->donneesVueGlobal = array_merge($this->donneesVueGlobal, $this->donneesVueNav);
    }

    public function accueil(Request $request) {
        return $this->getVue($request,'accueil','accueil',$this->donneesVueAccueil);
    }

    public function choixDate(Request $request) {
        return $this->getVue($request,'choix_liste','choix_date');
    }

    public function choixDepart(Request $request) {
        return $this->getVue($request,'choix_liste','choix_depart');
    }

    public function reservationChoixAutreVehicule(Request $request) {
        return $this->getVue($request,'choix_deux_options','reservation_choix_autre_vehicule');
    }

    public function reservationChoixRemorque(Request $request) {
        return $this->getVue($request,'choix_deux_options','reservation_choix_remorque');
    }

    public function reservationChoixVehicule(Request $request) {
        if (!isset($_GET['destination']) or !isset($_GET['heure'])) {
            return redirect()->route('index');
        }
        $request->session()->put('destination', htmlspecialchars($_GET['destination']));
        $request->session()->put('heure', htmlspecialchars($_GET['heure']));
        return $this->getVue($request,'choix_deux_options','reservation_choix_vehicule');
    }

    public function reservationChoixVoiture(Request $request) {
        return $this->getVue($request,'choix_deux_options','reservation_choix_voiture');
    }

    public function reservationMatieres(Request $request) {
        $poidsEleve = $this->estDerniereURL($request, 'reservation_poids') && $_GET['dernierChoix'] == 1;
        $request->session()->put('poids_eleve', $poidsEleve);
        return $this->getVue($request,'choix_deux_options','reservation_matieres');
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
        return $this->getVue($request,'choix_deux_options','reservation_poids');
    }

    public function informations(Request $request) {
        return $this->getVue($request,'informations','informations');
    }

    public function informationsAnimaux(Request $request) {
        return $this->getVue($request,'informations','informations_animaux');
    }

    public function informationsMatieres(Request $request) {
        return $this->getVue($request,'informations','informations_matieres');
    }

    public function reservationPaiement(Request $request) {
        return $this->getVue($request,'reservation_paiement','reservation_paiement');
    }

    public function reservationPassagers(Request $request) {
        if ($this->estDerniereURL($request, 'reservation_choix_vehicule') && $_GET["dernierChoix"] == 2) {
            $request->session()->put('type_vehicule', 'Pieton');
            $request->session()->put('poids_eleve', false);
        }
        //dd($request->session()->all();
        return $this->getVue($request,'reservation_passagers','reservation_passagers');
    }

    public function reservationConfirmation(Request $request) {
        return $this->getVue($request,'reservation_confirmation','reservation_confirmation');
    }


    private function getVue(Request $request, $interface, $page, $donneesVueLocal = []) {
        $request->session()->put('derniere_URL', $page);
        $donneesVue = array_merge($this->donneesVueGlobal, $donneesVueLocal);
        return view(REPERTOIRE_INTERFACES . '.' . $interface . '.' . SOUS_REPERTOIRE_PAGES . '.' . $page, $donneesVue);
    }

    private function estDerniereURL(Request $request, $chaine) {
        return $request->session()->get('derniere_URL') == $chaine;
    }
}
