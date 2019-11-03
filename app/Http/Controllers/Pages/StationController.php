<?php

namespace App\Http\Controllers\Pages;


use App\Http\Controllers\ModeleController;


use App\Statics\Views\interfaces\administration\DonneesVueStation;
use Illuminate\Http\Request;
use App;

class StationController extends ModeleController
{

    public function __construct()
    {
        parent::__construct();
        $this->setNomPage('administration/station');
        $this->setDonneesStatiques(new DonneesVueStation());
    }

    protected function getTypesColonnes()
    {
        $typesColonnes = [
            ['#', 'id'],
            ['Nom', 'text'],
        ];
        return $typesColonnes;
    }


    protected function getModeles()
    {
        return App\Station::all();
    }

    protected function getModeleParId($id)
    {
        return App\Station::find($id);
    }

    protected function getNouveauModele()
    {
        return new App\Station();
    }

}
