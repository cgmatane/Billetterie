<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table = 'commande';
    protected $primaryKey = 'id_commande';

    public function getVehicule() {
        return Vehicule::find($this->id_vehicule)->first();
    }

    public function getAcheteur() {
        return Acheteur::find($this->id_acheteur)->first();
    }

    public function getTickets() {
        return Ticket::where('id_commande',$this->id_commande)->get();
    }
}
