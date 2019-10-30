<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passager extends Model
{
    protected $table = 'passager';
    protected $primaryKey = 'id_passager';

    protected $guarded = ['id_passager'];

    public $timestamps = false;

    public function acheteur() {
        return Acheteur::find($this->id_passager);
        //return $this->belongsTo('App\Acheteur', 'id_acheteur', 'id_acheteur');
    }

    public function getDependances($recursif = true) {
        return array();
    }
}

