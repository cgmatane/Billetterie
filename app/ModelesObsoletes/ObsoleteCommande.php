<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObsoleteCommande extends ModeleParent
{
    protected $table = 'commande';
    protected $primaryKey = 'id_commande';

    protected $guarded = ['id_commande'];

    public $timestamps = false;


    public function getNomAffiche()
    {
        return "ObsoleteCommande ".$this->nom;
    }

    public function acheteur() {
        return ObsoleteAcheteur::find($this->id_commande);
        //return $this->belongsTo('App\ObsoleteAcheteur', 'id_acheteur', 'id_acheteur');
    }

    public function relationAcheteur() {
        return $this->belongsTo('App\ObsoleteAcheteur', 'id_acheteur', 'id_acheteur');
    }

    public function vehicule() {
        return Vehicule::find($this->id_commande);
        //return $this->belongsTo('App\Vehicule', 'id_vehicule', 'id_vehicule');
    }

    public function relationVehicule() {
        return $this->belongsTo('App\Vehicule', 'id_vehicule', 'id_vehicule');
    }

    public function passagers() {
        return $this->relationAcheteur()->first()->relationPassagers();
    }

    public function tickets() {
        return Ticket::where('id_commande', $this->id_commande)->get();
        //return $this->hasMany('App\Ticket', 'id_commande', 'id_commande');
    }

    protected function getDependancesDirectes()
    {
        return [$this->tickets()];
    }

}
