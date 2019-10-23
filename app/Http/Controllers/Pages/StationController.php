<?php

namespace App\Http\Controllers\Pages;

use App;
use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\administration\DonneesVueStation;
use Illuminate\Http\Request;

class StationController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('administration/station');
        $this->setDonneesStatiques(new DonneesVueStation());
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
        $email = $requete->session()->get('utilisateur.email');
        $valeurs = App\Station::all()->sortBy("id_station");
        $this->donneesDynamiques = [
            'email'=>$email,
            'valeurs'=>$valeurs,
            'attributs' => [
                'id_station',
                'nom',
            ]
        ];
    }
    public function gererValidation(Request $requete)
    {
        switch ($requete->get('submit')){
            case "ajouter" :
                $this->gererAjout($requete);
                break;
            case "modifier" :
                dd($requete->get('submit'));
                break;
            case "supprimer" :
                $this->gererSupression($requete);
                break;
            default :
                break;
        }


    }

    private function gererAjout(Request $requete){
        $station = new App\Station();
        $station->nom = htmlentities($requete->nom);
        $station->save();
    }
    private function gererModification(Request $requete){


    }
    private function gererSupression(Request $requete){
        switch ($requete->type){
            case "no-cascade":
                $tabPlannifications = [];
                $tabTrajets = [];
                $idStation = $requete->id;
                $trajetsDepart = App\Trajet::where('id_station_depart', $idStation )->get()->all();
                $trajetsArrive = App\Trajet::where('id_station_arrivee', $idStation )->get()->all();
                array_push($tabTrajets, $trajetsDepart, $trajetsArrive);
                if($tabTrajets){
                    foreach ($tabTrajets as $trajets){
                        foreach($trajets as $trajet){
                            $plannification = App\Programmation::where('id_trajet',$trajet['id_trajet'] )->get()->all();
                            array_push($tabPlannifications,$plannification);
                        }
                    }
                    $tabVue = $this->creerTableauPourVue($tabTrajets,$tabPlannifications);
                    return back()->with('cascade',$tabVue);
                }
                break;
            default:
                dd($requete->type);

        }
    }

    private function creerTableauPourVue($tabTrajets,$tabPlannifications){
        $tabVue = [];




    }

}
