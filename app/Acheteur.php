<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acheteur extends ModeleParent
{
    protected $table = 'acheteur';
    protected $primaryKey = 'id_acheteur';

    protected $guarded = ['id_acheteur'];

    public $timestamps = false;

    public function getNomAffiche()
    {
        return "Acheteur ".$this->nom;
    }

    public function getNombrePassagers() {
        return Passager::where('id_acheteur', $this->id_acheteur)->count();
    }

    public function passagers() {
        return Passager::where('id_acheteur', $this->id_acheteur)->get();
        //return $this->hasMany('App\Passager', 'id_acheteur', 'id_acheteur');
    }

    public function commandes() {
        return Commande::where('id_acheteur', $this->id_acheteur)->get();
        //return $this->hasMany('App\Commande', 'id_acheteur', 'id_acheteur');
    }

    protected function getDependancesDirectes()
    {
        return [$this->passagers(),$this->commandes()];
    }
}

