<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\accueil\DonneesVueAccueil;
use App\Station;
use DateTime;
use Illuminate\Http\Request;


class AccueilController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('accueil');
        $this->setDonneesStatiques(new DonneesVueAccueil());
    }

    public function gererValidation(Request $requete)
    {
        $heure = $requete->input('heure');
        $requete->session()->put('ticket.heure', $heure);
        $destination = $requete->input('destination');
        $requete->session()->put('ticket.destination', $destination);
        $requete->session()->put('ticket.type_vehicule', null);
        return redirect(route('reservation_choix_vehicule'));
    }

    //On va injecter des donnees venant de la DB dans la vue
    protected function setDonneesDynamiques(Request $requete = null) {

        if ($requete->session()->has('ticket.date')) {
            $date = $requete->session()->get('ticket.date');
        }
        else {
            $date = (int)strftime('%d')." ".strftime('%B');
            $requete->session()->put('ticket.date', $date);
        }

        if ($requete->session()->has('ticket.email')) {
            $messageValidation = $requete->session()->get('ticket.email');
        }
        else {
            $messageValidation = "";
        }


        if ($requete->session()->has('ticket.depart')) {
            $nomStationDepart = $requete->session()->get('ticket.depart');
            $stationDepart = Station::where('nom', $nomStationDepart)->first();
        }
        else {
            $stationDepart = Station::all()->first();
            $nomStationDepart = $stationDepart->nom;
            $requete->session()->put('ticket.depart', $nomStationDepart);
        }

        //On recupere tous les trajets partant de cette station (liste d'objets, voir methode dans la classe Station)
        $trajets = $stationDepart->trajetsPartantDeStation();

        //C'est cette liste qu'on injectera aux donnees dynamiques, c'est un tableau de tableau associatif aux cles 'station arrivee' et 'heure depart'
        $trajetsVue = array();

        //Pour chaque trajet...
        foreach($trajets as $trajet) {
            //Pour chaque programmations du trajet courant.... (voir MCD pour plus de comprehension)
            foreach($trajet->programmations() as $programmation) {
                //Si la programmation n'est pas annule et que la date de la programmation est celle du jour selectionne...
                if (!$programmation->annulation and date("Y-m-d") == date('Y-m-d', strtotime($programmation->date_depart))) {
                    $trajetVue = array(
                        'stationArrivee' => $trajet->stationArrivee()->nom,
                        'heureDepart' => date('H:i', strtotime($programmation->date_depart))
                    );
                    array_push($trajetsVue, $trajetVue);
                }
            }
        }

        //On injecte aux donnees la date d'aujourd'hui en francais (affiché en haut de la vue) et les trajets
        $this->donneesDynamiques = array(
            'date'=>$date,
            'trajets'=>$trajetsVue,
            'depart'=>$nomStationDepart,
            'validation'=>$messageValidation,
        );
    }
}
