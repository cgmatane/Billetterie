<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;

use App\Statics\Views\interfaces\administration\DonneesVueNavire;
use Illuminate\Http\Request;
use App;

class NavireController extends PageController
{

    private $attributsColonnes;
    private $entreesClesEtrangeres;

    public function __construct() {
        parent::__construct();
        $this->setNomPage('administration/navire');
        $this->setDonneesStatiques(new DonneesVueNavire());
        $this->attributsColonnes = $this->getAttributsColonnes();
        $this->entreesClesEtrangeres = [
            'passager'=>['attributs_lies'=>['id_passager'], 'cles_etrangeres'=>[]],
        ];
    }

    public function gererValidation(Request $requete)
    {
        if ($requete->method() == "POST") {
            try {
                $donnees = [];
                foreach ($this->attributsColonnes as $attribut) {
                    $donnees[$attribut] = $requete->input($attribut);
                }
                if ($requete->input('edition') == '1') {
                    $entree = App\Navire::find((int)$requete->input($this->attributsColonnes[0]));
                    $entree->update($donnees);
                }
                if ($requete->input('edition') == '0') {
                    $entree = new App\Navire();
                    $result = $entree->create($donnees);
                    $result->save();
                }

                if ($requete->input('submit') == 'supprimer') {
                    $this->gererSupression($requete);
                }

            }
            catch (\Exception $e) {
            }
        }
        return redirect(route("administration.navire"));
    }

    private function gererSupression(Request $requete){

        switch ($requete->type){
            case "no-cascade":
                $entree = App\Navire::find((int)$requete->input('id'));
                try {
                    $dependances = $entree->getDependances();
                }
                catch (\Exception $e) {
                }

                if (count($dependances) == 0){
                    $entree->delete();
                    return null;
                }else{
                    //return $this->creerTableauPourVue($trajets,$planifications,$entree);
                }
                break;
            case "cascade" :
                /* TODO */
                break;
            default:
                break;

        }
    }


    protected function getAttributsColonnes() {
        return array_keys(App\Navire::firstOrNew([])->getAttributes());
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
        $email = $requete->session()->get('utilisateur.email');
        $entrees = $this->getEntreesSimplifiesDeModeles(App\Navire::all()->sortBy($this->attributsColonnes[0]));
        $this->donneesDynamiques = [
            'email'=>$email,
            'entrees'=>$entrees,
            'colonnes'=>[
                ['attribut'=>$this->attributsColonnes[0],'nom'=>'#', 'type'=>'id'],
                ['attribut'=>$this->attributsColonnes[1], 'nom'=>'Nom','type'=>'text'],
                ['attribut'=>$this->attributsColonnes[2],'nom'=>'Nombre places passager', 'type'=>'number'],
                ['attribut'=>$this->attributsColonnes[3],'nom'=>'Nombre places véhicules', 'type'=>'number'],
            ],
            'tables_cles_etrangeres'=>[

            ]
        ];
    }

    protected function getEntreesSimplifiesDeModeles($modeles) {
        $entrees = [];
        foreach ($modeles as $modele) {
            $modeleId = $modele->getAttributes()[$this->attributsColonnes[0]];
            $entrees[$modeleId] = [];
            foreach (array_slice($modele->getAttributes(), 1) as $attribut=>$valeur) {
                $entrees[$modeleId][$attribut] = $valeur;
            }
        }
        return $entrees;
    }

}

