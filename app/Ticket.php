<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'ticket'; /*Definit le nom de la table de la BD correspondant a associer au modele
                                        (par defaut la valeur de $table est le nom de la classe en snake case suivit d'un s)*/
    protected $primaryKey = 'id_ticket';

    public function getProgrammation() {
        return Programmation::find($this->id_programmation)->first();
    }

    public function getAcheteur() {
        return Acheteur::find($this->id_acheteur)->first();
    }

    public function getCommande() {
        return Commande::find($this->id_commande)->first();
    }
}
