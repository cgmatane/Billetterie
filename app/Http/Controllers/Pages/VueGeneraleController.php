<?php

namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Navire;
use App\ObsoleteProgrammation;
use App\Passager;
use App\Statics\Views\interfaces\vue_generale\DonneesVueVueGenerale;
use App\Station;
use App\Trajet;
use App\Vehicule;
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

        $donneesTrajet = Trajet::get()->take(5)->sortBy('date_depart')->all();
        foreach ($donneesTrajet as $donneeTrajet){
            $donneeTrajet['nombrePassagers'] = $donneeTrajet->getNombrePassagers();
            $donneeTrajet['nombrePlacesPassagers'] = $donneeTrajet->getNombrePlacesPassagers();
            $donneeTrajet['nombreVehicules'] = $donneeTrajet->getNombreVehicules();
            $donneeTrajet['nombrePlacesVehicules'] = $donneeTrajet->getNombrePlacesVehicules();
        }

        $donneesStats = [];
        $donneesStation = [
            'titre' => 'station',
            'nombre' => Station::all()->count(),
            ];
        array_push($donneesStats,$donneesStation);
        $donneesNavire = [
            'titre' => 'navire',
            'nombre' => Navire::all()->count(),
        ];
        array_push($donneesStats,$donneesNavire);

        $donneesGenerales = [];
        $donneesPassager = [
            'titre' => 'passager',
            'nombre' => Passager::all()->count(),
        ];
        array_push($donneesGenerales,$donneesPassager);
        $donneesVehicule = [
            'titre' => 'véhicule',
            'nombre' => Vehicule::all()->count(),
        ];
        array_push($donneesGenerales,$donneesVehicule);


        $this->donneesDynamiques = [
            'email'=>$email,
            'donneesTrajet'=> $donneesTrajet,
            'donneesStats' => $donneesStats,
            'donneesGenerales' => $donneesGenerales

        ];
    }

}
