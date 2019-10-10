<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\accueil\DonneesVueAccueil;
use App\Station;
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
        return redirect(route('reservation_choix_vehicule'));
    }

    //On va injecter des donnees venant de la DB dans la vue
    protected function setDonneesDynamiques(Request $requete = null) {
        // A decommenter quand vous chercherez a vous connecter a la BD
        //On recupere la date d'aujourdhui (mois ecrit en francais)
        /*setlocale(LC_TIME, "fr");
        $dateAujourdhui = strftime('%d %B'); //jour mois en francais

        //On recupere la station d'id 2 dans la DB (sous forme d'objet)
        $stationDepart = Station::find(2);

        //On recupere tous les trajets partant de cette station (liste d'objets, voir methode dans la classe Station)
        $trajets = $stationDepart->getTrajetsPartantDeStation();

        //C'est cette liste qu'on injectera aux donnees dynamiques, c'est un tableau de tableau associatif aux cles 'station arrivee' et 'heure depart'
        $trajetsVue = array();

        //Pour chaque trajet...
        foreach($trajets as $trajet) {
            //Pour chaque programmations du trajet courant.... (voir MCD pour plus de comprehension)
            foreach($trajet->getProgrammations() as $programmation) {
                //Si la programmation n'est pas annule et que la date de la programmation est celle du jour selectionne...
                if (!$programmation->annulation and date("Y-m-d") == date('Y-m-d', strtotime($programmation->date_depart))) {
                    $trajetVue = array(
                        'stationArrivee' => $trajet->getStationArrivee()->nom,
                        'heureDepart' => date('H:i', strtotime($programmation->date_depart))
                    );
                    array_push($trajetsVue, $trajetVue);
                }
            }
        }

        //On injecte aux donnees la date d'aujourd'hui en francais (affiché en haut de la vue) et les trajets
        $this->donneesDynamiques = array(
            'date_aujourdhui'=>$dateAujourdhui,
            'trajets'=>$trajetsVue,
        );
        */
        if ($requete->session()->has('ticket.date'))
            $this->donneesDynamiques['date'] = $requete->session()->get('ticket.date');
        if ($requete->session()->has('ticket.depart'))
            $this->donneesDynamiques['depart'] = $requete->session()->get('ticket.depart');
    }
}
