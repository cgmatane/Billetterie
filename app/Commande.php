<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table = 'commande';
    protected $primaryKey = 'id_commande';

    public function getVehicule() {
        return Vehicule::where('id_vehicule', $this->id_vehicule)->get();
    }

    public function getAcheteur() {
        return Acheteur::where('id_acheteur', $this->id_acheteur)->get();
    }

    public function passagers()
    {
        return $this->getAcheteur()->first()->passagers();
    }

    public function vehicule()
    {
        return $this->hasOne('App\Vehicule', 'id_vehicule');
    }

    public function getTickets() {
        return Ticket::where('id_commande',$this->id_commande)->get();
    }
}
