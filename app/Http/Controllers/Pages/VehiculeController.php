<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\ModeleController;


use App\Statics\Views\interfaces\administration\DonneesVueVehicule;
use Illuminate\Http\Request;
use App;

class VehiculeController extends ModeleController
{

    public function __construct() {
        parent::__construct();
        $this->setNomPage('administration/vehicule');
        $this->setDonneesStatiques(new DonneesVueVehicule());
        $this->ajoutable = false;
        $this->editable = false;
        $this->supprimmable = false;
    }

    protected function getTypesColonnes() {
        $typesColonnes = [
            ['#', 'id'],
            ['Type du véhicule', 'cle|type_vehicule'],
            ['Couleur', 'text'],
            ['Immatriculation', 'text'],
            ['Modèle', 'text'],
            ['Marque', 'text'],
            ['Ticket', 'cle|ticket'],
        ];
        return $typesColonnes;
    }

    protected function setClesEtrangeres() {
        $nomTable = 'type_vehicule';
        $attributsLies = ['id_type_vehicule'];
        $nomEntrees = [];
        $entrees = App\TypeVehicule::get();
        foreach ($entrees as $entree) {
            $nomEntrees[$entree->getAttributes()[array_key_first($entree->getAttributes())]] = $entree->getNomAffiche();
        }
        $this->ajouterTableClesEtrangeres($nomTable, $attributsLies, $nomEntrees);
        $nomTable = 'ticket';
        $attributsLies = ['id_ticket'];
        $nomEntrees = [];
        $entrees = App\Ticket::get();
        foreach ($entrees as $entree) {
            $nomEntrees[$entree->getAttributes()[array_key_first($entree->getAttributes())]] = $entree->getNomAffiche();
        }
        $this->ajouterTableClesEtrangeres($nomTable, $attributsLies, $nomEntrees);
    }

    protected function getModeles() {
        return App\Vehicule::all();
    }

    protected function getModeleParId($id)
    {
        return App\Vehicule::find($id);
    }

    protected function getNouveauModele()
    {
        return new App\Vehicule();
    }

}

