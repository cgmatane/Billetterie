<?php


namespace App\Http\Controllers;


use App\Statics\Views\DonneesVue;
use Illuminate\Http\Request;

abstract class PageController extends Controller
{
    private $nomPage;
    private $donneesStatiques;
    protected $donneesDynamiques;

    public function __construct() {
        $this->init();
    }

    public final function getDonnees(Request $requete = null) {
        $this->setDonneesDynamiques($requete);
        return array_merge($this->donneesStatiques, $this->donneesDynamiques);
    }

    public final function getNomPage() {
        return $this->nomPage;
    }

    public function gererSession(Request $requete) {
        return null;
    }

    protected final function setNomPage($nomPage) {
        $this->nomPage = $nomPage;
    }


    protected final function setDonneesStatiques(DonneesVue $donneesStatiques) {
        $this->donneesStatiques = $donneesStatiques->getDonneesVue();
    }

    protected function setDonneesDynamiques(Request $requete = null) {}

    private function init() {
        $this->setNomPage = '';
        $this->donneesStatiques = array();
        $this->donneesDynamiques = array();
    }

}
