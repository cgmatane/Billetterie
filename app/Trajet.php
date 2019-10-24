<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    protected $table = 'trajet'; /*Definit le nom de la table de la BD correspondant a associer au modele
                                        (par defaut la valeur de $table est le nom de la classe en snake case suivit d'un s)*/
    protected $primaryKey = 'id_trajet';

    public function getStationDepart() {
        return Station::find($this->id_station_depart)->first();
    }

    public function getStationArrivee() {
        return Station::find($this->id_station_arrivee)->first();
    }

    public function getNavire() {
        return Navire::find($this->id_navire)->first();
    }

    public function getProgrammations() {
        return Programmation::where('id_trajet',$this->id_trajet)->get()->all();
    }
    public function getDependances(){
        return Programmation::where('id_trajet',$this->id_trajet)->get()->all();
    }
}
