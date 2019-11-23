<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends ModeleParent
{
    protected $table = 'vehicule'; /*Definit le nom de la table de la BD correspondant a associer au modele
                                        (par defaut la valeur de $table est le nom de la classe en snake case suivit d'un s)*/
    protected $primaryKey = 'id_vehicule';

    protected $guarded = ['id_vehicule'];

    public $timestamps = false;

    const SUPPLEMENT_POIDS_ELEVE = 8.00;

    public function getNomAffiche()
    {
        return "Véhicule ".$this->marque." modèle ".$this->modele . " couleur ".$this->couleur;
    }

    public function typeVehicule() {
        return TypeVehicule::find($this->type_vehicule);
        //return $this->belongsTo('App\TypeVehicule', 'type_vehicule', 'type_vehicule');
    }

    public function ticket() {
        return Ticket::find($this->id_ticket);
    }

    protected function getDependancesDirectes()
    {
        return array();
    }
}
