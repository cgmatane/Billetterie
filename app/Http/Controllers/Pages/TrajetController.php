<?php
namespace App\Http\Controllers\Pages;


use App\Http\Controllers\ModeleController;


use App\Statics\Views\interfaces\administration\DonneesVueTrajet;
use App;

class TrajetController extends ModeleController
{

    public function __construct()
    {
        parent::__construct();
        $this->setNomPage('administration/trajet');
        $this->setDonneesStatiques(new DonneesVueTrajet());
    }

    protected function getTypesColonnes()
    {
        $typesColonnes = [
            ['#', 'id'],
            ['Station départ', 'cle|station'],
            ['Station arrivée', 'cle|station'],
            ['Navire', 'cle|navire'],
        ];
        return $typesColonnes;
    }

    protected function setClesEtrangeres() {
        $nomTable = 'station';
        $attributsLies = ['id_station_depart', 'id_station_arrivee'];
        $nomEntrees = [];
        $entrees = App\Station::get();
        foreach ($entrees as $entree) {
            $nomEntrees[$entree->getAttributes()[array_key_first($entree->getAttributes())]] = $entree->getNomAffiche();
        }
        $this->ajouterTableClesEtrangeres($nomTable, $attributsLies, $nomEntrees);

        $nomTable = 'navire';
        $attributsLies = ['id_navire'];
        $nomEntrees = [];
        $entrees = App\Navire::get();
        foreach ($entrees as $entree) {
            $nomEntrees[$entree->getAttributes()[array_key_first($entree->getAttributes())]] = $entree->getNomAffiche();
        }
        $this->ajouterTableClesEtrangeres($nomTable, $attributsLies, $nomEntrees);
    }

    protected function getModeles()
    {
        return App\Trajet::all();
    }

    protected function getModeleParId($id)
    {
        return App\Trajet::find($id);
    }

    protected function getNouveauModele()
    {
        return new App\Trajet();
    }

}
