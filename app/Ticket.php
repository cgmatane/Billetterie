<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends ModeleParent
{
    protected $table = 'ticket'; /*Definit le nom de la table de la BD correspondant a associer au modele
                                        (par defaut la valeur de $table est le nom de la classe en snake case suivit d'un s)*/
    protected $primaryKey = 'id_ticket';

    protected $guarded = ['id_ticket'];

    public $timestamps = false;

    public function getNomAffiche()
    {
        return "Ticket ". $this->id_ticket;
    }

    public function programmation() {
        return Programmation::where('id_programmation', $this->id_programmation)->first();
        //return $this->hasOne('App\Programmation', 'id_ticket', 'id_ticket');
    }

    public function acheteur() {
        return Acheteur::where('id_acheteur', $this->id_acheteur)->first();
        //return $this->hasOne('App\Acheteur', 'id_ticket', 'id_ticket');
    }

    public function commande() {
        return Commande::where('id_commande', $this->id_commande)->first();
        //return $this->hasOne('App\Commande', 'id_ticket', 'id_ticket');
    }

    protected function getDependancesDirectes()
    {
        return array();
    }
}
