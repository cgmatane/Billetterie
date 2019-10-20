<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;

use App\Statics\Views\interfaces\administration\DonneesVueNavire;
use Illuminate\Http\Request;

class NavireController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('administration/navire');
        $this->setDonneesStatiques(new DonneesVueNavire());
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
        $email = $requete->session()->get('utilisateur.email');
        $this->donneesDynamiques = [
            'email'=>$email
        ];
    }

}

