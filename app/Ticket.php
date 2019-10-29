<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'ticket'; /*Definit le nom de la table de la BD correspondant a associer au modele
                                        (par defaut la valeur de $table est le nom de la classe en snake case suivit d'un s)*/
    protected $primaryKey = 'id_ticket';

    public function programmation() {
        return $this->hasOne('App\Programmation', 'id_ticket', 'id_ticket');
    }

    public function acheteur() {
        return $this->hasOne('App\Acheteur', 'id_ticket', 'id_ticket');
    }

    public function commande() {
        return $this->hasOne('App\Commande', 'id_ticket', 'id_ticket');
    }
}
