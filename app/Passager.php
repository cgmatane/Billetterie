<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passager extends ModeleParent
{
    protected $table = 'passager';
    protected $primaryKey = 'id_passager';

    protected $guarded = ['id_passager'];

    protected $hidden = ['id_passager', 'id_ticket', 'id_intervalle_age'];

    protected $appends = ['intervalle', 'tarif'];

    public $timestamps = false;

    public function getNomAffiche()
    {
        return "Passager ".$this->nom;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getPrenom(){
        return $this->prenom;
    }

    public function ticket() {
        return Ticket::find($this->id_ticket);
    }

    public function intervalleAge() {
        return IntervalleAge::find($this->id_intervalle_age);
        //return $this->belongsTo('App\TypeVehicule', 'id_type_vehicule', 'id_type_vehicule');
    }

    public function getIntervalleAttribute() {
        return $this->intervalleAge()->getNomAffiche();
    }

    public function getTarifAttribute() {
        return $this->intervalleAge()->getTarif();
    }

    protected function getDependancesDirectes()
    {
        return array();
    }
}

