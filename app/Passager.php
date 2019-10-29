<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passager extends Model
{
    protected $table = 'passager';
    protected $primaryKey = 'id_passager';

    public function acheteur() {
        return $this->belongsTo('App\Acheteur', 'id_acheteur', 'id_acheteur');
    }
}

