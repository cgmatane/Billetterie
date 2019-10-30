<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acheteur extends Model
{
    protected $table = 'acheteur';
    protected $primaryKey = 'id_acheteur';

    protected $guarded = ['id_acheteur'];

    public $timestamps = false;

    public function passagers() {
        return Passager::where('id_acheteur', $this->id_acheteur)->get();
        //return $this->hasMany('App\Passager', 'id_acheteur', 'id_acheteur');
    }

    public function commandes() {
        return Commande::where('id_acheteur', $this->id_acheteur)->get();
        //return $this->hasMany('App\Commande', 'id_acheteur', 'id_acheteur');
    }

    public function getDependances($recursif = true) {
        $dependances = [];

        $dependancesObjets = array_merge($this->passagers(), $this->commandes());
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

