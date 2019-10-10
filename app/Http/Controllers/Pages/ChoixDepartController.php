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

    public function gererValidation(Request $requete)
    {
        $depart = $requete->input('depart');
        $requete->session()->put('ticket.depart', $depart);
        return redirect(route('index'));
    }

    protected function setDonneesDynamiques(Request $requete = null) {
        $this->donneesDynamiques['type_information'] = 'depart';
        $this->donneesDynamiques['tab_items'] = [
            "Matane",
            "Godbout",
            "Baie Comeau",
        ];
    }
}
