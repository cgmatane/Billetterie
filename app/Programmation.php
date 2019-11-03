<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programmation extends ModeleParent
{
    protected $table = 'programmation'; /*Definit le nom de la table de la BD correspondant a associer au modele
                                        (par defaut la valeur de $table est le nom de la classe en snake case suivit d'un s)*/
    protected $primaryKey = 'id_programmation';

    protected $guarded = ['id_programmation'];

    public $timestamps = false;

    public function trajet() {
        return Trajet::find($this->id_programmation);
        //return $this->belongsTo('App\Trajet', 'id_trajet', 'id_trajet');
    }

    public function tickets() {
        return Ticket::where('id_programmation', $this->id_programmation)->get();
        //return $this->hasMany('App\Ticket', 'id_programmation', 'id_programmation');
    }

    protected function getDependancesDirectes()
    {
        return $this->tickets();
    }

    public function getNombrePassagers(){
        $nombreDePassager = 0;
        $tickets = $this->tickets();
        foreach ($tickets as $ticket){
            $commande = $ticket->commande();
            $acheteur = $commande->acheteur();
            $nombreDePassager += $acheteur->getnombrePassagers();
        }
        return $nombreDePassager;
    }

    public function getNombrePlacesPassagers(){
        $trajet = $this->trajet();
        $navire = $trajet->navire();
        return $navire['nombre_place_pieton'];
    }

}
