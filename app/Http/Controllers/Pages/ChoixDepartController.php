<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\choix_depart\DonneesVueChoixDepart;
use App\Station;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;

class ChoixDepartController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('depart');
        $this->setDonneesStatiques(new DonneesVueChoixDepart(0));
    }

    public function gererValidation(Request $requete)
    {
        $depart = $requete->input('depart');
        $requete->session()->put('ticket.depart', $depart);
        return redirect(route('index'));
    }

    protected function setDonneesDynamiques(Request $requete = null) {
        $this->donneesDynamiques['type_information'] = 'depart';
        $stations = Station::all();
        $this->donneesDynamiques['tab_items'] = [];
        foreach ($stations as $station) {
            array_push($this->donneesDynamiques['tab_items'], $station->getNom());
        }
    }
}
