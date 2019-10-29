<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table = 'commande';
    protected $primaryKey = 'id_commande';

    protected $guarded = ['id_commande'];

    public $timestamps = false;

    public function acheteur() {
        return $this->belongsTo('App\Acheteur', 'id_acheteur', 'id_acheteur');
    }

    public function vehicule() {
        return $this->belongsTo('App\Vehicule', 'id_vehicule', 'id_vehicule');
    }

    public function passagers()
    {
        return $this->getAcheteur()->first()->passagers();
    }

    public function tickets() {
        return $this->hasMany('App\Ticket', 'id_commande', 'id_commande');
    }

}
