<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\ModeleController;


use App\Statics\Views\interfaces\administration\DonneesVueAffichageGuardien;
use Illuminate\Http\Request;
use App;

class AffichageGuardienController extends ModeleController
{

    public function __construct() {
        parent::__construct();
        $this->setNomPage('administration/guardien');
        $this->setDonneesStatiques(new DonneesVueAffichageGuardien(0));
    }

    protected function getTypesColonnes() {
        $typesColonnes = [
            ['COMMENT', 'id'],
            ['JENLEVE', 'text'],
            ['CE TABLEAU', 'number'],
            ['FUCK', 'number'],
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

