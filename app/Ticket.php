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

    public function trajet() {
        return Trajet::find($this->id_trajet);
        //return $this->belongsTo('App\Trajet', 'id_trajet', 'id_trajet');
    }

    public function vehicule() {
        return Vehicule::where('id_ticket', $this->id_ticket)->first();
        //return $this->belongsTo('App\Vehicule', 'id_vehicule', 'id_vehicule');
    }

    public function relationVehicule() {
        return $this->belongsTo('App\Vehicule', 'id_ticket', 'id_ticket');
    }

    public function relationPassagers() {
        return $this->hasMany('App\Passager', 'id_ticket', 'id_ticket');
    }

    public function passagers() {
        return Passager::where('id_ticket', $this->id_ticket)->get();
        //return $this->hasOne('App\ObsoleteAcheteur', 'id_ticket', 'id_ticket');
    }

    public function getNombreVehicules() {
        return Vehicule::where('id_ticket', $this->id_ticket)->count();
    }
    public function getNombrePassagers() {
        return Passager::where('id_ticket', $this->id_ticket)->count();
    }

    protected function getDependancesDirectes()
    {
        return [[$this->vehicule()], $this->passagers()];
    }
}
