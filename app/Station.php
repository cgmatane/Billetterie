<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $table = 'station'; /*Definit le nom de la table de la BD correspondant a associer au modele
                                        (par defaut la valeur de $table est le nom de la classe en snake case suivit d'un s)*/
    protected $primaryKey = 'id_station';
    public $timestamps = false;

    public function getTrajetsPartantDeStation() {
        return Trajet::where('id_station_depart', $this->id_station)->get()->all();
    }

    public function getTrajetsArrivantAStation() {
        return Trajet::where('id_station_arrivee', $this->id_station)->get()->all();
    }

    public function getDependances(){
        return Trajet::where('id_station_arrivee', $this->id_station)->orWhere('id_station_depart', $this->id_station)->get()->all();
    }


}
