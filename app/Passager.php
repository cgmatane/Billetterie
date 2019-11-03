<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passager extends ModeleParent
{
    protected $table = 'passager';
    protected $primaryKey = 'id_passager';

    protected $guarded = ['id_passager'];

    public $timestamps = false;

    public function getNomAffiche()
    {
        return $this->nom;
    }

    public function acheteur() {
        return Acheteur::find($this->id_passager);
        //return $this->belongsTo('App\Acheteur', 'id_acheteur', 'id_acheteur');
    }

    protected function getDependancesDirectes()
    {
        return array();
    }
}

