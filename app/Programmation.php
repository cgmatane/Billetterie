<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programmation extends Model
{
    protected $table = 'programmation'; /*Definit le nom de la table de la BD correspondant a associer au modele
                                        (par defaut la valeur de $table est le nom de la classe en snake case suivit d'un s)*/
    protected $primaryKey = 'id_programmation';

    protected $guarded = ['id_programmation'];

    public $timestamps = false;

    public function trajet() {
        return Trajet::find($this->id_programmation);
        //return $this->belongsTo('App\Trajet', 'id_trajet', 'id_trajet');
    }

    public function tickets() {
        return Ticket::where('id_programmation', $this->id_programmation)->get();
        //return $this->hasMany('App\Ticket', 'id_programmation', 'id_programmation');
    }

    public function getDependances($recursif = true) {
        $dependances = [];

        $dependancesObjets = (array)$this->tickets();
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
