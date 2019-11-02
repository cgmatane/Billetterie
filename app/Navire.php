<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navire extends ModeleParent
{
    protected $table = 'navire'; /*Definit le nom de la table de la BD correspondant a associer au modele
                                        (par defaut la valeur de $table est le nom de la classe en snake case suivit d'un s)*/
    protected $primaryKey = 'id_navire';

    protected $guarded = ['id_navire'];

    public $timestamps = false;

    public function trajets() {
        return Trajet::where('id_navire', $this->id_navire)->get();
        //return $this->hasMany('App\Trajet', 'id_navire', 'id_navire');
    }

    protected function getDependancesDirectes()
    {
        return $this->trajets();
    }
}
