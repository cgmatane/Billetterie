<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\ModeleController;


use App\Statics\Views\interfaces\administration\DonneesVueNavire;
use Illuminate\Http\Request;
use App;

class NavireController extends ModeleController
{

    public function __construct() {
        parent::__construct();
        $this->setNomPage('administration/navire');
        $this->setDonneesStatiques(new DonneesVueNavire(0));
    }

    protected function getTypesColonnes() {
        $typesColonnes = [
            ['#', 'id'],
            ['Nom', 'text'],
            ['Nombre places passagers', 'number'],
            ['Nombre places véhicules', 'number'],
        ];
        return $typesColonnes;
    }

    protected function getModeles() {
        return App\Navire::all();
    }

    protected function getModeleParId($id)
    {
        return App\Navire::find($id);
    }

    protected function getNouveauModele()
    {
        return new App\Navire();
    }

}

