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
        return TypeVehicule::find($this->id_type_vehicule);
        //return $this->belongsTo('App\TypeVehicule', 'id_type_vehicule', 'id_type_vehicule');
    }

    public function commandes() {
        return Commande::where('id_vehicule', $this->id_vehicule)->get();
        //return $this->hasMany('App\Commande', 'id_vehicule', 'id_vehicule');
    }

    public function getDependances($recursif = true) {
        $dependances = [];

        $dependancesObjets = (array)$this->commandes();
        if (!$recursif) {
            return $dependancesObjets;
        }
        foreach ($dependancesObjets as $dependanceObjet) {
            array_push($dependances, ['dependancePrimaire' => $dependanceObjet, 'dependancesSecondaires' => []]);
            array_push($dependances[count($dependances)-1]['dependancesSecondaires'],$dependanceObjet->getDependances());
        }
        return $dependances;
    }
}
