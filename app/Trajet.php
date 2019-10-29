<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    protected $table = 'trajet'; /*Definit le nom de la table de la BD correspondant a associer au modele
                                        (par defaut la valeur de $table est le nom de la classe en snake case suivit d'un s)*/
    protected $primaryKey = 'id_trajet';

    public function stationDepart() {
        return $this->belongsTo('App\Station', 'id_station_arrivee', 'id_station');
    }

    public function stationArrivee() {
        return $this->belongsTo('App\Station', 'id_station_depart', 'id_station');
    }

    public function navire() {
        return $this->belongsTo('App\Navire', 'id_navire', 'id_navire');
    }

    public function getProgrammations() {
        return Programmation::where('id_trajet',$this->id_trajet)->get()->all();
    }
    public function getDependances(){
        return Programmation::where('id_trajet',$this->id_trajet)->get()->all();
    }
}
