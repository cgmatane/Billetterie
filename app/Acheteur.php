<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acheteur extends Model
{
    protected $table = 'acheteur';
    protected $primaryKey = 'id_acheteur';

    public function getPassagers() {
        return Passager::where('id_acheteur',$this->id_acheteur)->get();
    }

    public function passagers() {
        return $this->hasMany('App\Passager', 'id_acheteur');
    }

    public function getCommandes() {
        return Commande::where('id_acheteur',$this->id_acheteur)->get();
    }

    public function getTickets() {
        return Ticket::where('id_acheteur',$this->id_acheteur)->get();
    }
}

