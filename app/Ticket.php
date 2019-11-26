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
    public function getMail(){
        return $this->mail;
    }
    public function getPremierPassagerNom(){
        return  Passager::where('id_ticket', $this->id_ticket)->first()->getNom();
    }
    public function getPremierPassagerPrenom(){
        return  Passager::where('id_ticket', $this->id_ticket)->first()->getPrenom();
    }

    public function getTarif() {
        $tarif = 0;
        $passagers = $this->passagers();
        for ($i = 0;$i<count($passagers);$i++) {
            $tarif += $passagers[$i]->intervalleAge()->tarif;
        }
        $vehicule = $this->vehicule();
        if ($vehicule != null) {
            $tarif += (int)($vehicule->typeVehicule()->tarif);
            if ($vehicule->poids_eleve)
                $tarif += Vehicule::SUPPLEMENT_POIDS_ELEVE;
        }
        return $tarif;
    }

    public static function genererNumeroFacture() {
        return Ticket::all()->last()->numero_facture + rand(1, 10);
    }

    public static function genererCodeQR() {
        do {
            $codeQR = "";
            for ($i = 0; $i < 7; $i++) {
                $chiffreAleatoire = rand(1, 36);
                switch ($chiffreAleatoire) { // ;(
                    case 1:
                        $codeQR .= 'A';
                        break;
                    case 2:
                        $codeQR .= 'B';
                        break;
                    case 3:
                        $codeQR .= 'C';
                        break;
                    case 4:
                        $codeQR .= 'D';
                        break;
                    case 5:
                        $codeQR .= 'E';
                        break;
                    case 6:
                        $codeQR .= 'F';
                        break;
                    case 7:
                        $codeQR .= 'G';
                        break;
                    case 8:
                        $codeQR .= 'H';
                        break;
                    case 9:
                        $codeQR .= 'I';
                        break;
                    case 10:
                        $codeQR .= 'J';
                        break;
                    case 11:
                        $codeQR .= 'K';
                        break;
                    case 12:
                        $codeQR .= 'L';
                        break;
                    case 13:
                        $codeQR .= 'M';
                        break;
                    case 14:
                        $codeQR .= 'N';
                        break;
                    case 15:
                        $codeQR .= 'O';
                        break;
                    case 16:
                        $codeQR .= 'P';
                        break;
                    case 17:
                        $codeQR .= 'Q';
                        break;
                    case 18:
                        $codeQR .= 'R';
                        break;
                    case 19:
                        $codeQR .= 'S';
                        break;
                    case 20:
                        $codeQR .= 'T';
                        break;
                    case 21:
                        $codeQR .= 'U';
                        break;
                    case 22:
                        $codeQR .= 'V';
                        break;
                    case 23:
                        $codeQR .= 'W';
                        break;
                    case 24:
                        $codeQR .= 'X';
                        break;
                    case 25:
                        $codeQR .= 'Y';
                        break;
                    case 26:
                        $codeQR .= 'Z';
                        break;
                    case 27:
                        $codeQR .= '0';
                        break;
                    case 28:
                        $codeQR .= '1';
                        break;
                    case 29:
                        $codeQR .= '2';
                        break;
                    case 30:
                        $codeQR .= '3';
                        break;
                    case 31:
                        $codeQR .= '4';
                        break;
                    case 32:
                        $codeQR .= '5';
                        break;
                    case 33:
                        $codeQR .= '6';
                        break;
                    case 34:
                        $codeQR .= '7';
                        break;
                    case 35:
                        $codeQR .= '8';
                        break;
                    case 36:
                        $codeQR .= '9';
                        break;
                }
            }
        } while (Ticket::QRExiste($codeQR));
        return $codeQR;
    }

    private static function QRExiste($codeQR) {
        return Ticket::where('qrcode', $codeQR)->count() > 0;
    }

    protected function getDependancesDirectes()
    {
        return [[$this->vehicule()], $this->passagers()];
    }
}
