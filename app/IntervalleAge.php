<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class IntervalleAge extends ModeleParent
{


    protected $table = 'intervalle_age'; /*Definit le nom de la table de la BD correspondant a associer au modele
                                        (par defaut la valeur de $table est le nom de la classe en snake case suivit d'un s)*/
    protected $primaryKey = 'id_intervalle_age';

    protected $guarded = ['id_intervalle_age'];

    public $timestamps = false;

    public function getNomAffiche()
    {
        return $this->age_min . '-' . $this->age_max;
    }

    public function passagers() {
        return Passager::where('id_intervalle_age', $this->id_intervalle_age)->get();
    }

    protected function getDependancesDirectes()
    {
        return [$this->passagers()];
    }
}
