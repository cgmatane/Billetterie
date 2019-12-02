<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ModeleController;


use App\Statics\Views\interfaces\administration\DonneesVueIntervalleAge;
use Illuminate\Http\Request;
use App;

class IntervalleAgeController extends ModeleController
{

    public function __construct() {
        parent::__construct();
        $this->setNomPage('administration/intervalle_age');
        $this->setDonneesStatiques(new DonneesVueIntervalleAge(FrontEndController::$langueCourante));
    }

    protected function getTypesColonnes() {
        $typesColonnes = [
            ['#', 'id'],
            ['Âge minimum', 'number'],
            ['Âge maximum', 'number'],
            ['Tarif', 'number'],
        ];
        return $typesColonnes;
    }

    protected function getModeles() {
        return App\IntervalleAge::all();
    }

    protected function getModeleParId($id)
    {
        return App\IntervalleAge::find($id);
    }

    protected function getNouveauModele()
    {
        return new App\IntervalleAge();
    }

}

