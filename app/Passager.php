<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passager extends Model
{
    protected $table = 'passager';
    protected $primaryKey = 'id_passager';

    public function getAcheteur() {
        return Acheteur::where('id_passager',$this->id_passager)->first();
    }
}

