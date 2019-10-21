<?php

namespace App\Http\Controllers\Pages;

use App;
use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\administration\DonneesVueTrajet;
use Illuminate\Http\Request;

class TrajetController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('administration/trajet');
        $this->setDonneesStatiques(new DonneesVueTrajet());
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
        $email = $requete->session()->get('utilisateur.email');
        $valeurs = App\Trajet::all()->sortBy("id_trajet");
        foreach ($valeurs as $valeur){
            $stationDepart = App\Station::where('id_station', $valeur['id_station_depart'] )->get()->first();
            $stationArrivee = App\Station::where('id_station', $valeur['id_station_arrivee'] )->get()->first();
            $valeur['station_depart'] = $stationDepart['nom'];
            $valeur['station_arrivee'] = $stationArrivee['nom'];
        }

        $this->donneesDynamiques = [
            'email'=>$email,
            'valeurs'=>$valeurs,
            'attributs' => [
                'id_trajet',
                'station_depart',
                'station_arrivee',
                'id_navire'
            ]
        ];
    }

}
