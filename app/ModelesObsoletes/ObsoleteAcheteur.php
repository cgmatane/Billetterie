<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObsoleteAcheteur extends ModeleParent
{
    protected $table = 'acheteur';
    protected $primaryKey = 'id_acheteur';

    protected $guarded = ['id_acheteur'];

    public $timestamps = false;

    public function getNomAffiche()
    {
        return "ObsoleteAcheteur ".$this->nom;
    }

    public function getNombrePassagers() {
        return Passager::where('id_acheteur', $this->id_acheteur)->count();
    }

    public function passagers() {
        return Passager::where('id_acheteur', $this->id_acheteur)->get();
        //return $this->hasMany('App\Passager', 'id_acheteur', 'id_acheteur');
    }

    public function relationPassagers() {
        return $this->hasMany('App\Passager', 'id_acheteur', 'id_acheteur');
    }

    public function commandes() {
        return ObsoleteCommande::where('id_acheteur', $this->id_acheteur)->get();
        //return $this->hasMany('App\ObsoleteCommande', 'id_acheteur', 'id_acheteur');
    }

    protected function getDependancesDirectes()
    {
        return [$this->passagers(),$this->commandes()];
    }
}

