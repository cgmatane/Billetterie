<?php

namespace App\Http\Controllers\Pages;


use App\Http\Controllers\ModeleController;


use App\Statics\Views\interfaces\administration\DonneesVueProgrammation;
use Illuminate\Http\Request;
use App;

class ProgrammationController extends ModeleController
{

    public function __construct()
    {
        parent::__construct();
        $this->setNomPage('administration/programmation');
        $this->setDonneesStatiques(new DonneesVueProgrammation());
    }

    protected function getTypesColonnes()
    {
        $typesColonnes = [
            ['#', 'id'],
            ['Trajet', 'cle|trajet'],
            ['Date de départ', 'date'],
            ['Date d\'arrivée', 'date'],
            ['Nom', 'text'],
            ['Annulé', 'bool'],
        ];
        return $typesColonnes;
    }

    protected function setClesEtrangeres() {
        $nomTable = 'trajet';
        $attributsLies = ['id_trajet'];
        $nomEntrees = [];
        $entrees = App\Trajet::get();
        foreach ($entrees as $entree) {
            $nomEntrees[$entree->getAttributes()[array_key_first($entree->getAttributes())]] = $entree->getNomAffiche();
        }
        $this->ajouterTableClesEtrangeres($nomTable, $attributsLies, $nomEntrees);
    }

    protected function getModeles()
    {
        return App\ObsoleteProgrammation::all();
    }

    protected function getModeleParId($id)
    {
        return App\ObsoleteProgrammation::find($id);
    }

    protected function getNouveauModele()
    {
        return new App\ObsoleteProgrammation();
    }

}
