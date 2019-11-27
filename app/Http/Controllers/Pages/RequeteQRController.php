<?php

namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;

use App\Ticket;
use App\Scan;
use Illuminate\Http\Request;

class RequeteQRController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('requete-qr');
//        $this->setDonneesStatiques(new DonneesVueConnexion());
    }

    public function gererValidation(Request $requete)
    {
        // AHEIFBG
        // UGJANGT
        $reponse = "{}";
        if (isset($_GET['qr'])) {
            $qr = htmlentities($_GET['qr']);

            $ticket = Ticket::where('qrcode', $qr)->first();

            if ($ticket != null) {
                $reponse = $ticket->toJSON();
                $billet_parse = json_decode($reponse, true);
                $passagers = $billet_parse["relation_passagers"];
                $vehicule = $billet_parse["relation_vehicule"];
                $id_ticket = $billet_parse["id_ticket"];
                $id_trajet = $billet_parse["id_trajet"];
                $qr_code = $billet_parse["qrcode"];
                $date_achat = $billet_parse["date_achat"];
                $telephone = $billet_parse["telephone"];
                $commentaires = $billet_parse["commentaires"];
                $scan_courant = Scan::getScanCourant();
                $scan_courant->id_ticket = $id_ticket;
                $scan_courant->id_trajet = $id_trajet;
                $scan_courant->qr_code = $qr_code;
                $scan_courant->date_achat = $date_achat;
                $scan_courant->telephone = $telephone;
                $scan_courant->commentaires = $commentaires;
                $scan_courant->relation_passagers = $passagers;
                $scan_courant->relation_vehicule = $vehicule;
                $scan_courant->save();



            }
        }
        echo $reponse;
    }
}
