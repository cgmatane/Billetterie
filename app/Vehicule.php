<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $table = 'vehicule'; /*Definit le nom de la table de la BD correspondant a associer au modele
                                        (par defaut la valeur de $table est le nom de la classe en snake case suivit d'un s)*/
    protected $primaryKey = 'id_vehicule';

    public function getTypeVehicule() {
        return TypeVehicule::find($this->id_type_vehicule)->first();
    }

    public function getCommandes() {
        return Commande::where('id_vehicule',$this->id_vehicule)->get();
    }
}
