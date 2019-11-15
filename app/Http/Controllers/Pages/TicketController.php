<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\ModeleController;


use App\Statics\Views\interfaces\administration\DonneesVueTicket;
use Illuminate\Http\Request;
use App;

class TicketController extends ModeleController
{

    public function __construct() {
        parent::__construct();
        $this->setNomPage('administration/ticket');
        $this->setDonneesStatiques(new DonneesVueTicket(0));
        $this->ajoutable = false;
        $this->editable = false;
        $this->supprimmable = false;
    }

    protected function getTypesColonnes() {
        $typesColonnes = [
            ['#', 'id'],
            ['Trajet', 'cle|trajet'],
            ['Prix', 'number'],
            ['Identifiant QR', 'text'],
            ['Date d\'achat', 'date'],
            ['Nombre de bagages', 'number'],
            ['Nombres d\'animaux', 'number'],
            ['Téléphone', 'number'],
            ['Courriel', 'text'],
        ];
        return $typesColonnes;
    }

    protected function setClesEtrangeres() {
        $nomTable = 'trajet';
        $attributsLies = ['id_trajet'];
        $nomEntrees = [];
        $entrees = App\Trajet::get();
        foreach ($entrees as $entree) {
            $nomEntrees[$entree->getAttributes()[array_key_first($entree->getAttributes())]] = $entree->getNomAffiche();
        }
        $this->ajouterTableClesEtrangeres($nomTable, $attributsLies, $nomEntrees);
    }

    protected function getModeles() {
        return App\Ticket::all();
    }

    protected function getModeleParId($id)
    {
        return App\Ticket::find($id);
    }

    protected function getNouveauModele()
    {
        return new App\Ticket();
    }

}

