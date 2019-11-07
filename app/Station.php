<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends ModeleParent
{
    protected $table = 'station'; /*Definit le nom de la table de la BD correspondant a associer au modele
                                        (par defaut la valeur de $table est le nom de la classe en snake case suivit d'un s)*/
    protected $primaryKey = 'id_station';

    protected $guarded = ['id_station'];

    public $timestamps = false;

    public function getNomAffiche()
    {
        return "Station ".$this->nom;
    }

    public function getNom() {
        return $this->nom;
    }

    public function trajetsPartantDeStation() {
        return Trajet::where('id_station_depart', $this->id_station)->get();
        //return $this->hasMany('App\Trajet', 'id_station_depart', 'id_trajet');
    }

    public function trajetsArrivantAStation() {
        return Trajet::where('id_station_arrivee', $this->id_station)->get();
        //return $this->hasMany('App\Trajet', 'id_station_arrivee', 'id_trajet');
    }

    protected function getDependancesDirectes()
    {
        return [$this->trajetsPartantDeStation(),$this->trajetsArrivantAStation()];
    }
}
