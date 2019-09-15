<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function accueil() {
        return view('pages.accueil');
    }

    public function choixDate() {
        return view('pages.choix_date');
    }

    public function choixDepart() {
        return view('pages.choix_depart');
    }

    public function informations() {
        return view('pages.informations');
    }

    public function informationsAnimaux() {
        return view('pages.informations_animaux');
    }

    public function informationsMatieres() {
        return view('pages.informations_matieres');
    }

    public function reservationChoixAutreVehicule() {
        return view('pages.reservation_choix_autre_vehicule');
    }

    public function reservationChoixHoraireDepart() {
        return view('pages.reservation_choix_horaire_depart');
    }

    public function reservationChoixRemorque() {
        return view('pages.reservation_choix_remorque');
    }

    public function reservationChoixVehicule() {
        return view('pages.reservation_choix_vehicule');
    }

    public function reservationChoixVoiture() {
        return view('pages.reservation_choix_voiture');
    }

    public function reservationConfirmation() {
        return view('pages.reservation_confirmation');
    }

    public function reservationMatieres() {
        return view('pages.reservation_matieres');
    }

    public function reservationPaiement() {
        return view('pages.reservation_paiement');
    }

    public function reservationPassagers() {
        return view('pages.reservation_passagers');
    }

    public function reservationPoids() {
        return view('pages.reservation_poids');
    }
}
