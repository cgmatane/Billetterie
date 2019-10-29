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
        return $this->belongsTo('App\Trajet', 'id_trajet', 'id_trajet');
    }

    public function tickets() {
        return $this->hasMany('App\Ticket', 'id_programmation', 'id_programmation');
    }

}
