<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $table = 'vehicule'; /*Definit le nom de la table de la BD correspondant a associer au modele
                                        (par defaut la valeur de $table est le nom de la classe en snake case suivit d'un s)*/
    protected $primaryKey = 'id_vehicule';

    protected $guarded = ['id_vehicule'];

    public $timestamps = false;

    public function typeVehicule() {
        return $this->belongsTo('App\TypeVehicule', 'id_type_vehicule', 'id_type_vehicule');
    }

    public function commandes() {
        return $this->hasMany('App\Commande', 'id_vehicule', 'id_vehicule');
    }
}
