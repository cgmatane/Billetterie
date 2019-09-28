<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\choix_liste\pages\DonneesVueChoixDepart;
use Illuminate\Http\Request;

class ChoixDepartController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('depart');
        $this->setDonneesStatiques(new DonneesVueChoixDepart());
    }

    protected function setDonneesDynamiques(Request $requete = null) {
        $this->donneesDynamiques['type_information'] = 'depart';
        $this->donneesDynamiques['tab_items'] = [
            ['valeur' => 'matane',
                'contenu' => 'Matane'],
            ['valeur' => 'baie_comeau',
                'contenu' => 'Baie Comeau'],
            ['valeur' => 'godbout',
                'contenu' => 'Godbout'],
        ];
    }
}
