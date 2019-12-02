<?php
namespace App\Http\Controllers\Pages;


use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ModeleController;


use App\Mail\SendMail;
use App\Statics\Views\interfaces\administration\DonneesVueTrajet;
use App\Statics\Views\interfaces\dynamic_annulation_email_template\DonneesVueDynamicAnnulationEmailTemplate;
use App;
use Illuminate\Support\Facades\Mail;

class TrajetController extends ModeleController
{

    public function __construct()
    {
        parent::__construct();
        $this->setNomPage('administration/trajet');
        $this->setDonneesStatiques(new DonneesVueTrajet(FrontEndController::$langueCourante));
    }

    protected function getTypesColonnes()
    {
        $typesColonnes = [
            ['#', 'id'],
            ['Station départ', 'cle|station'],
            ['Station arrivée', 'cle|station'],
            ['Navire', 'cle|navire'],
            ['Date de départ', 'date'],
            ['Date d\'arrivée', 'date'],
            ['Nom', 'text'],
            ['Annulé', 'bool'],
        ];
        return $typesColonnes;
    }

    protected function setClesEtrangeres() {
        $nomTable = 'station';
        $attributsLies = ['id_station_depart', 'id_station_arrivee'];
        $nomEntrees = [];
        $entrees = App\Station::get();
        foreach ($entrees as $entree) {
            $nomEntrees[$entree->getAttributes()[array_key_first($entree->getAttributes())]] = $entree->getNomAffiche();
        }
        $this->ajouterTableClesEtrangeres($nomTable, $attributsLies, $nomEntrees);

        $nomTable = 'navire';
        $attributsLies = ['id_navire'];
        $nomEntrees = [];
        $entrees = App\Navire::get();
        foreach ($entrees as $entree) {
            $nomEntrees[$entree->getAttributes()[array_key_first($entree->getAttributes())]] = $entree->getNomAffiche();
        }
        $this->ajouterTableClesEtrangeres($nomTable, $attributsLies, $nomEntrees);
    }

    protected function envoyerEmailAnnulation($entree){
        $premiersPassagers = $entree->getPremiersPassagersAvecMailParTicket();
        $depart = $entree->stationDepart()->getNom();
        $arrivee = $entree->stationArrivee()->getNom();
        $dateDepart = $entree->getDateDepart();
        $dateArrivee = $entree->getDateArrivee();

        $data = array(
            'nom'      => '' ,
            'prenom'      => '',
            'depart'    => $depart,
            'arrivee'    => $arrivee,
            'date_depart'      => explode(' ',$dateDepart)[0],
            'heure_depart'      => explode(' ',$dateDepart)[1],
            'date_arrivee'      => explode(' ',$dateArrivee)[0],
            'heure_arrivee'      => explode(' ',$dateArrivee)[1]
        );
        foreach ($premiersPassagers as $premierPassager){
            $data['nom'] = $premierPassager['nom'];
            $data['prenom'] = $premierPassager['prenom'];
            $mail = $premierPassager['mail'];
            $langue = $premierPassager['langue'];
            Mail::to($mail)->send(new SendMail('annulation',array_merge($data, (new DonneesVueDynamicAnnulationEmailTemplate($langue))->getDonneesVue())));
        }
    }

    protected function getModeles()
    {
        return App\Trajet::all();
    }

    protected function getModeleParId($id)
    {
        return App\Trajet::find($id);
    }

    protected function getNouveauModele()
    {
        return new App\Trajet();
    }

}
