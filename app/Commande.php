<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends ModeleParent
{
    protected $table = 'commande';
    protected $primaryKey = 'id_commande';

    protected $guarded = ['id_commande'];

    public $timestamps = false;

    public function acheteur() {
        return Acheteur::find($this->id_commande);
        //return $this->belongsTo('App\Acheteur', 'id_acheteur', 'id_acheteur');
    }

    public function vehicule() {
        return Vehicule::find($this->id_commande);
        //return $this->belongsTo('App\Vehicule', 'id_vehicule', 'id_vehicule');
    }

    //public function passagers() {
    //    return $this->acheteur()->first()->passagers();
    //}

    public function tickets() {
        return Ticket::where('id_commande', $this->id_commande)->get();
        //return $this->hasMany('App\Ticket', 'id_commande', 'id_commande');
    }

    protected function getDependancesDirectes()
    {
        return $this->tickets();
    }

}
