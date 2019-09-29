<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acheteur extends Model
{
    protected $table = 'acheteur';
    protected $primaryKey = 'id_acheteur';

    public function getPassager() {
        return Passager::find($this->id_passager)->first();
    }

    public function getCommandes() {
        return Commande::where('id_acheteur',$this->id_acheteur)->get();
    }

    public function getTickets() {
        return Ticket::where('id_acheteur',$this->id_acheteur)->get();
    }
}

