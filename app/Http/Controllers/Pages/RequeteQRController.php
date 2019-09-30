<?php

namespace App\Http\Controllers\Pages;


use App\Commande;
use App\Http\Controllers\PageController;

use App\Statics\Views\interfaces\connexion\DonneesVueConnexion;
use Illuminate\Http\Request;

class RequeteQRController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('requete-qr');
//        $this->setDonneesStatiques(new DonneesVueConnexion());
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
        // AHEIFBG
        // UGJANGT
        if (isset($_GET['qr'])) {
            $qr = htmlentities($_GET['qr']);

            $commande = Commande::where('qrcode', $qr)->first();
            if ($commande == null) {
                echo "{}";
            } else {
                $commande->passagers;
                if ($commande->id_vehicule != null) {
                    $commande->vehicule;
                }
                echo $commande->toJSON();
            }
        } else {
            echo '{}';
        }
    }
}
