<?php

namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Programmation;
use App\Statics\Views\interfaces\vue_generale\DonneesVueVueGenerale;
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
        $donneesRemplissageProgrammation = [];
        $email = $requete->session()->get('utilisateur.email');
        $donneesProgrammation = Programmation::get()->take(5)->sortBy('date_depart')->all();
        foreach ($donneesProgrammation as $donneeProgrammation){
            $donneeRemplissage = [];
            $donneeRemplissage['nombrePassagers'] = $donneeProgrammation->getNombrePassagers();
            $donneeRemplissage['nombrePlacePassagers'] = $donneeProgrammation->getNombrePlacePassagers();
            array_push($donneesRemplissageProgrammation,$donneeRemplissage);
        }
        dd($donneesRemplissageProgrammation);
        $this->donneesDynamiques = [
            'email'=>$email,
            'donneesProgrammation'=> $donneesProgrammation,
            'donneesRemplissageProgramation'=> $donneesRemplissageProgrammation
        ];
    }

}
