<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programmation extends Model
{
    protected $table = 'programmation'; /*Definit le nom de la table de la BD correspondant a associer au modele
                                        (par defaut la valeur de $table est le nom de la classe en snake case suivit d'un s)*/
    protected $primaryKey = 'id_programmation';

    public function getTrajet() {
        return Trajet::find($this->id_trajet)->first();
    }

    public function getTickets() {
        return Ticket::where('id_trajet',$this->id_trajet)->get();
    }

}
