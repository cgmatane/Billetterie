<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class TypeVehicule extends ModeleParent
{
    const PIETON = 0;
    const VOITURE = 1;
    const VOITURE_AVEC_REMORQUE = 2;
    const CAMIONETTE = 3;
    const POIDS_LOURD = 4;

    protected $table = 'type_vehicule'; /*Definit le nom de la table de la BD correspondant a associer au modele
                                        (par defaut la valeur de $table est le nom de la classe en snake case suivit d'un s)*/
    protected $primaryKey = 'id_type_vehicule';

    protected $guarded = ['id_type_vehicule'];

    public $timestamps = false;

    public function getNomAffiche()
    {
        return "Véhicule type ".$this->nom;
    }

    public function vehicules() {
        return Vehicule::where('id_type_vehicule', $this->id_type_vehicule)->get();
        //return $this->hasMany('App\Vehicule', 'id_type_vehicule', 'id_type_vehicule');
    }

    protected function getDependancesDirectes()
    {
        return [$this->vehicules()];
    }
}
