<?php

namespace App\Http\Controllers;

use App\Statics\Views\DonneesVueAccueil;
use App\Statics\Views\DonneesVueNav;

define('REPERTOIRE_VUES', 'pages');

class FrontEndController extends Controller
{
    private $donneesVueGlobal;

    private $donneesVueNav;

    private $donneesVueAccueil;

    public function __construct()
    {
        //Les donnees statiques de vues communes a toutes les pages
        $this->donneesVueGlobal = [];

        $this->donneesVueNav = (new DonneesVueNav())->getDonneesVue();

        $this->donneesVueAccueil = (new DonneesVueAccueil())->getDonneesVue();

        $this->donneesVueGlobal = array_merge($this->donneesVueGlobal, $this->donneesVueNav);
    }

    public function accueil() {
        return $this->getVue('accueil',$this->donneesVueAccueil);
    }

    public function choixDate() {
        return $this->getVue('choix_date');
    }

    public function choixDepart() {
        return $this->getVue('choix_depart');
    }

    public function informations() {
        return $this->getVue('informations');
    }

    public function informationsAnimaux() {
        return $this->getVue('informations_animaux');
    }

    public function informationsMatieres() {
        return $this->getVue('informations_matieres');
    }

    public function reservationChoixAutreVehicule() {
        return $this->getVue('reservation_choix_autre_vehicule');
    }

    public function reservationChoixHoraireDepart() {
        return $this->getVue('reservation_choix_horaire_depart');
    }

    public function reservationChoixRemorque() {
        return $this->getVue('reservation_choix_remorque');
    }

    public function reservationChoixVehicule() {
        return $this->getVue('reservation_choix_vehicule');
    }

    public function reservationChoixVoiture() {
        return $this->getVue('reservation_choix_voiture');
    }

    public function reservationConfirmation() {
        return $this->getVue('reservation_confirmation');
    }

    public function reservationMatieres() {
        return $this->getVue('reservation_matieres');
    }

    public function reservationPaiement() {
        return $this->getVue('reservation_paiement');
    }

    public function reservationPassagers() {
        return $this->getVue('reservation_passagers');
    }

    public function reservationPoids() {
        return $this->getVue('reservation_poids');
    }

    private function getVue($vue, $donneesVueLocal = []) {
        $donneesVue = array_merge($this->donneesVueGlobal, $donneesVueLocal);
        return view(REPERTOIRE_VUES . '.' . $vue . '.' .$vue, $donneesVue);
    }

}
