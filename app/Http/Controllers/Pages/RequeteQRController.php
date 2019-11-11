<?php

namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;

use App\Ticket;
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
        if (isset($_GET['qr'])) {
            $qr = htmlentities($_GET['qr']);

            $ticket = Ticket::where('qrcode', $qr)->first();
            if ($ticket == null) {
                echo "{}";
            } else {
                $ticket->relationPassagers;
                /*if ($commande->id_vehicule != null) {*/
                    $ticket->relationVehicule;
//                }
                echo $ticket->toJSON();
            }
        } else {
            echo '{}';
        }
    }
}
