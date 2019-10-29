<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acheteur extends Model
{
    protected $table = 'acheteur';
    protected $primaryKey = 'id_acheteur';

    public function passagers() {
        return $this->hasMany('App\Passager', 'id_acheteur', 'id_acheteur');
    }

    public function commandes() {
        return $this->hasMany('App\Commande', 'id_acheteur', 'id_acheteur');
    }
}

