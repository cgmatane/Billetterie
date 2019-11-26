<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trajet extends ModeleParent
{
    protected $table = 'trajet'; /*Definit le nom de la table de la BD correspondant a associer au modele
                                        (par defaut la valeur de $table est le nom de la classe en snake case suivit d'un s)*/
    protected $primaryKey = 'id_trajet';

    protected $guarded = ['id_trajet'];

    public $timestamps = false;

    public function getNomAffiche()
    {
        return "Trajet ".$this->stationDepart()->nom . '->' . $this->stationArrivee()->nom;
    }

    public function stationDepart() {
        return Station::find($this->id_station_depart);
        //return $this->belongsTo('App\Station', 'id_station_depart', 'id_station');
    }

    public function stationArrivee() {
        return Station::find($this->id_station_arrivee);
        //return $this->belongsTo('App\Station', 'id_station_arrivee', 'id_station');
    }

    public function navire() {
        return Navire::find($this->id_navire);
        //return $this->belongsTo('App\Navire', 'id_navire', 'id_navire');
    }

    public function tickets() {
        return Ticket::where('id_trajet', $this->id_trajet)->get();
        //return $this->hasMany('App\ObsoleteProgrammation', 'id_trajet', 'id_trajet');
    }
    public function getDateDepart(){
        return $this->date_depart;
    }
    public function getDateArrivee(){
        return $this->date_arrivee;
    }
    public function getNombrePassagers(){
        $nombrePassagers = 0;
        $tickets = $this->tickets();
        foreach ($tickets as $ticket){
            $nombrePassagers += $ticket->getNombrePassagers();
        }
        return $nombrePassagers;
    }
    public function getNombrePlacesPassagers(){
        $navire =  $this->navire();
        return $navire->getNombrePlacesPassagers();
    }
    public function getNombreVehicules(){
        $nombreVehicules = 0;
        $tickets = $this->tickets();
        foreach ($tickets as $ticket){
            $nombreVehicules += $ticket->getNombreVehicules();
        }
        return $nombreVehicules;
    }
    public function getNombrePlacesVehicules(){
        $navire =  $this->navire();
        return $navire->getNombrePlacesVehicules();
    }
    public function getPremiersPassagersAvecMailParTicket(){
        $permiersPassagers = [];
        $tickets = $this->tickets();
        foreach ($tickets as $ticket){
            $passagerAvecMail =[
                'nom' => $ticket->getPremierPassagerNom(),
                'prenom' => $ticket->getPremierPassagerPrenom(),
                'mail' => $ticket->mail,
                'langue' => $ticket->langue,
            ];
            array_push($permiersPassagers,$passagerAvecMail);
        }
        return $permiersPassagers;
    }

    public function getNombrePlacesVehiculeRestantes() {
        return $this->navire()->nombre_place_vehicule - $this->getNombreVehicules();
    }

    public function getNombrePlacesPassagerRestantes() {
        return $this->navire()->nombre_place_pieton - $this->getNombrePassagers();
    }

    protected function getDependancesDirectes() {
        return [$this->tickets()];
    }


}
