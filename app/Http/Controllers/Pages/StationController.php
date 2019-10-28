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
                if (!$tableauVue = $this->gererSupression($requete)){
                    return back();
                }else{
                    return back()->with('cascades',$tableauVue);
                }

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
        $station = App\Station::where('id_station', $requete->id)->get()->first();
        switch ($requete->type){
            case "no-cascade":
                $trajets = $station->getDependances();
                $planifications = [];
                foreach ($trajets as $trajet){
                    $planifications += $trajet->getDependances();
                }
                if (!$trajets && !$planifications){
                    $station->delete();
                    return null;
                }else{
                    return $this->creerTableauPourVue($trajets,$planifications,$station);
                }
                break;
            case "cascade" :
                $station->delete();
                return null;
                break;
            default:
                break;

        }
    }

    private function creerTableauPourVue($trajets,$planifications,$station){
        return $tableauVue = [
            "trajets" => $trajets,
            "planifications" => $planifications,
            "id" => $station->id_station,
        ];

    }



}
