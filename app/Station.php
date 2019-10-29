<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $table = 'station'; /*Definit le nom de la table de la BD correspondant a associer au modele
                                        (par defaut la valeur de $table est le nom de la classe en snake case suivit d'un s)*/
    protected $primaryKey = 'id_station';
    public $timestamps = false;

    public function trajetsPartantDeStation() {
        return $this->hasMany('App\Trajet', 'id_station_depart', 'id_trajet');
    }

    public function trajetsArrivantAStation() {
        return $this->hasMany('App\Trajet', 'id_station_arrivee', 'id_trajet');
    }

    public function getDependances(){
        return Trajet::where('id_station_arrivee', $this->id_station)->orWhere('id_station_depart', $this->id_station)->get()->all();
    }


}
