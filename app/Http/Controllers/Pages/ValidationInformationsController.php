<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\validation_informations\DonneesVueValidationInformations;
use Illuminate\Http\Request;

class ValidationInformationsController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('validation');

        $this->setDonneesStatiques(new DonneesVueValidationInformations());
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
        $typeVehicule = $requete->session()->get('ticket.type_vehicule');
        $date = $requete->session()->get('ticket.date');
        $heure = $requete->session()->get('ticket.heure');
        $depart = $requete->session()->get('ticket.depart');
        $destination = $requete->session()->get('ticket.destination');
        $noms = $requete->session()->get('ticket.noms');
        $prenoms = $requete->session()->get('ticket.prenoms');
        $ages = $requete->session()->get('ticket.ages');
        $email = $requete->session()->get('ticket.email');
        $numero = $requete->session()->get('ticket.numero');

        $this->donneesDynamiques = [
            'type_vehicule'=>$typeVehicule,
            'date'=>$date,
            'heure'=>$heure,
            'depart'=>$depart,
            'destination'=>$destination,
            'noms'=>$noms,
            'prenoms'=>$prenoms,
            'ages'=>$ages,
            'email'=>$email,
            'numero'=>$numero
        ];
    }

}
