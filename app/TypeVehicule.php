<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class TypeVehicule extends Model
{
    const PIETON = 1;
    const VOITURE = 2;
    const VOITURE_AVEC_REMORQUE = 3;
    const CAMIONETTE = 4;
    const POIDS_LOURD = 5;

    protected $table = 'type_vehicule'; /*Definit le nom de la table de la BD correspondant a associer au modele
                                        (par defaut la valeur de $table est le nom de la classe en snake case suivit d'un s)*/
    protected $primaryKey = 'id_type_vehicule';

    public function getVehicules() {
        return Vehicule::where('id_type_vehicule',$this->id_type_vehicule)->get();
    }
}
