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
        return "Passager ".$this->nom;
    }

    public function ticket() {
        return Ticket::find($this->id_ticket);
    }

    public function intervalleAge() {
        return IntervalleAge::find($this->id_intervalle_age);
        //return $this->belongsTo('App\TypeVehicule', 'id_type_vehicule', 'id_type_vehicule');
    }


    protected function getDependancesDirectes()
    {
        return array();
    }
}

