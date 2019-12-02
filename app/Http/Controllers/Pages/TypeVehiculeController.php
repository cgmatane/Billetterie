<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ModeleController;


use App\Statics\Views\interfaces\administration\DonneesVueTypeVehicule;
use Illuminate\Http\Request;
use App;

class TypeVehiculeController extends ModeleController
{

    public function __construct() {
        parent::__construct();
        $this->setNomPage('administration/type_vehicule');
        $this->setDonneesStatiques(new DonneesVueTypeVehicule(FrontEndController::$langueCourante));
    }

    protected function getTypesColonnes() {
        $typesColonnes = [
            ['#', 'id'],
            ['Nom', 'text'],
            ['Tarif', 'number'],
        ];
        return $typesColonnes;
    }

    protected function getModeles() {
        return App\TypeVehicule::all();
    }

    protected function getModeleParId($id)
    {
        return App\TypeVehicule::find($id);
    }

    protected function getNouveauModele()
    {
        return new App\TypeVehicule();
    }

}

