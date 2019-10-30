<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    protected $table = 'trajet'; /*Definit le nom de la table de la BD correspondant a associer au modele
                                        (par defaut la valeur de $table est le nom de la classe en snake case suivit d'un s)*/
    protected $primaryKey = 'id_trajet';

    protected $guarded = ['id_trajet'];

    public $timestamps = false;

    public function stationDepart() {
        return Station::find($this->id_station_depart);
        //return $this->belongsTo('App\Station', 'id_station_depart', 'id_station');
    }

    public function stationArrivee() {
        return Station::find($this->id_station_arrivee);
        //return $this->belongsTo('App\Station', 'id_station_arrivee', 'id_station');
    }

    public function navire() {
        return Navire::find($this->id_navire);
        //return $this->belongsTo('App\Navire', 'id_navire', 'id_navire');
    }

    public function programmations() {
        return Programmation::where('id_trajet', $this->id_trajet)->get();
        //return $this->hasMany('App\Programmation', 'id_trajet', 'id_trajet');
    }


    public function getDependances($recursif = true) {
        $dependances = [];

        $dependancesObjets = $this->programmations();
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
