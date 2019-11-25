<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\accueil\DonneesVueAccueil;
use App\Station;
use Illuminate\Http\Request;


class AccueilController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('accueil');
        $this->setDonneesStatiques(new DonneesVueAccueil(FrontEndController::$langueCourante));
    }

    public function gererValidation(Request $requete)
    {
        $requete->session()->put('ticket.trajet', $requete->input('idTrajet'));
        return redirect(route('reservation_choix_vehicule'));
    }

    //On va injecter des donnees venant de la DB dans la vue
    protected function setDonneesDynamiques(Request $requete = null) {

        if ($requete->session()->has('commande_terminee')) {
            $mail = $requete->session()->get('ticket.mail');
            $requete->session()->flush();
        }

        if ($requete->session()->has('ticket.date')) {
            $date = $requete->session()->get('ticket.date');
        }
        else {
            $date = date('d-m-Y');
            $requete->session()->put('ticket.date', $date);
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
                //Si le trajet n'est pas annule et que la date du trajet est celle du jour selectionne...
            if (!$trajet->annulation and date("Y-m-d", strtotime($date)) == date('Y-m-d', strtotime($trajet->date_depart))) {
                $trajetVue = array(
                    'id' => $trajet->id_trajet,
                    'stationArrivee' => $trajet->stationArrivee()->nom,
                    'heureDepart' => date('H\hi', strtotime($trajet->date_depart)),
                );
                array_push($trajetsVue, $trajetVue);
            }
        }

        usort($trajetsVue, function($a, $b) {
            if ($a['stationArrivee'] == $b['stationArrivee'])
                return $a['heureDepart'] > $b['heureDepart'];
            return ($a['stationArrivee'] > $b['stationArrivee']);
        });

        //On injecte aux donnees la date d'aujourd'hui en francais (affiché en haut de la vue) et les trajets
        $this->donneesDynamiques = array(
            'date'=>$this->getDateTraduite($date),
            'trajets'=>$trajetsVue,
            'depart'=>$nomStationDepart,
        );
        if (isset($mail)) {
            $this->donneesDynamiques['mail'] = $mail;
        }
    }

    function getDateTraduite($date) {
        $dateSplitte = explode('-', $date);
        $mois = FrontEndController::$DONNEES_STATIQUES_GLOBALES['global_mois'][$dateSplitte[1]-1];
        return $dateSplitte[0] ." " . $mois . " " . $dateSplitte[2];
    }
}
