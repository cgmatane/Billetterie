<?php

namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Navire;
use App\ObsoleteProgrammation;
use App\Statics\Views\interfaces\vue_generale\DonneesVueVueGenerale;
use App\Station;
use App\Trajet;
use Illuminate\Http\Request;

class VueGeneraleController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('administration/vue_generale');
        $this->setDonneesStatiques(new DonneesVueVueGenerale());
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
        $email = $requete->session()->get('utilisateur.email');
        /* TODO remplacer par autre chose
        $donneesProgrammation = ObsoleteProgrammation::get()->take(5)->sortBy('date_depart')->all();
        foreach ($donneesProgrammation as $donneeProgrammation){
            $donneeProgrammation['nombrePassagers'] = $donneeProgrammation->getNombrePassagers();
            $donneeProgrammation['nombrePlacesPassagers'] = $donneeProgrammation->getNombrePlacesPassagers();
            $donneeProgrammation['nombreVehicules'] = $donneeProgrammation->getNombreVehicules();
            $donneeProgrammation['nombrePlacesVehicules'] = $donneeProgrammation->getNombrePlacesVehicules();
        }
        */
        $donneesStats = [];
        $donneesStation = [
            'titre' => 'station',
            'nombre' => Station::all()->count(),
            ];
        array_push($donneesStats,$donneesStation);
        $donneesTrajet = [
            'titre' => 'trajet',
            'nombre' => Trajet::all()->count(),
        ];
        array_push($donneesStats,$donneesTrajet);
        $donneesNavire = [
            'titre' => 'navire',
            'nombre' => Navire::all()->count(),
        ];
        array_push($donneesStats,$donneesNavire);
        $this->donneesDynamiques = [
            'email'=>$email,
            //'donneesProgrammation'=> $donneesProgrammation,
            'donneesStats' => $donneesStats

        ];
    }

}
