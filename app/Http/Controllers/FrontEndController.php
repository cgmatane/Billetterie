<?php

namespace App\Http\Controllers;

use App\Statics\Views\DonneesVueNav;

class FrontEndController extends Controller
{

    private $donneesVueNav;
    private $donneesVueGlobal;

    public function __construct()
    {
        $this->donneesVueGlobal = [];
        $this->donneesVueNav = (new DonneesVueNav())->getDonneesVue();
        $this->donneesVueGlobal = array_merge($this->donneesVueGlobal, $this->donneesVueNav);
    }

    public function accueil() {
        return $this->getVue('pages.accueil');
    }

    public function choixDate() {
        return $this->getVue('pages.choix_date');
    }

    public function choixDepart() {
        return $this->getVue('pages.choix_depart');
    }

    public function informations() {
        return $this->getVue('pages.informations');
    }

    public function informationsAnimaux() {
        return $this->getVue('pages.informations_animaux');
    }

    public function informationsMatieres() {
        return $this->getVue('pages.informations_matieres');
    }

    public function reservationChoixAutreVehicule() {
        return $this->getVue('pages.reservation_choix_autre_vehicule');
    }

    public function reservationChoixHoraireDepart() {
        return $this->getVue('pages.reservation_choix_horaire_depart');
    }

    public function reservationChoixRemorque() {
        return $this->getVue('pages.reservation_choix_remorque');
    }

    public function reservationChoixVehicule() {
        return $this->getVue('pages.reservation_choix_vehicule');
    }

    public function reservationChoixVoiture() {
        return $this->getVue('pages.reservation_choix_voiture');
    }

    public function reservationConfirmation() {
        return $this->getVue('pages.reservation_confirmation');
    }

    public function reservationMatieres() {
        return $this->getVue('pages.reservation_matieres');
    }

    public function reservationPaiement() {
        return $this->getVue('pages.reservation_paiement');
    }

    public function reservationPassagers() {
        return $this->getVue('pages.reservation_passagers');
    }

    public function reservationPoids() {
        return $this->getVue('pages.reservation_poids');
    }

    private function getVue($vue, $donneesVueLocal = []) {
        $donneesVue = array_merge($this->donneesVueGlobal, $donneesVueLocal);
        return view($vue, $donneesVue);
    }

}
