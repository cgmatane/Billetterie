<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ModeleController;


use App\Statics\Views\interfaces\administration\DonneesVuePassager;
use Illuminate\Http\Request;
use App;

class PassagerController extends ModeleController
{

    public function __construct() {
        parent::__construct();
        $this->setNomPage('administration/passager');
        $this->setDonneesStatiques(new DonneesVuePassager(FrontEndController::$langueCourante));
        $this->ajoutable = false;
        $this->editable = false;
        $this->supprimmable = false;
    }

    protected function getTypesColonnes() {
        $typesColonnes = [
            ['#', 'id'],
            ['Nom', 'text'],
            ['Prénom', 'text'],
            ['Date de naissance', 'date'],
            ['Ticket', 'cle|ticket'],
            ['Intervalle âge', 'cle|intervalle_age'],
        ];
        return $typesColonnes;
    }

    protected function setClesEtrangeres() {
        $nomTable = 'ticket';
        $attributsLies = ['id_ticket'];
        $nomEntrees = [];
        $entrees = App\Ticket::get();
        foreach ($entrees as $entree) {
            $nomEntrees[$entree->getAttributes()[array_key_first($entree->getAttributes())]] = $entree->getNomAffiche();
        }
        $this->ajouterTableClesEtrangeres($nomTable, $attributsLies, $nomEntrees);

        $nomTable = 'intervalle_age';
        $attributsLies = ['id_intervalle_age'];
        $nomEntrees = [];
        $entrees = App\IntervalleAge::get();
        foreach ($entrees as $entree) {
            $nomEntrees[$entree->getAttributes()[array_key_first($entree->getAttributes())]] = $entree->getNomAffiche();
        }
        $this->ajouterTableClesEtrangeres($nomTable, $attributsLies, $nomEntrees);
    }

    protected function getModeles() {
        return App\Passager::all();
    }

    protected function getModeleParId($id)
    {
        return App\Passager::find($id);
    }

    protected function getNouveauModele()
    {
        return new App\Passager();
    }

}

