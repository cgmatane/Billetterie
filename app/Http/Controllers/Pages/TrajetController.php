<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;

use App\Statics\Views\interfaces\administration\DonneesVueTrajet;
use Illuminate\Http\Request;
use App;

class TrajetController extends PageController
{

    private $attributsColonnes;
    private $entreesClesEtrangeres;

    public function __construct() {
        parent::__construct();
        $this->setNomPage('administration/trajet');
        $this->setDonneesStatiques(new DonneesVueTrajet());
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
                    $entree = App\Trajet::find((int)$requete->input($this->attributsColonnes[0]));
                    $entree->update($donnees);
                }
                if ($requete->input('edition') == '0') {
                    $entree = new App\Trajet();
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
        return redirect(route("administration.trajet"));
    }

    private function gererSupression(Request $requete){

        switch ($requete->type){
            case "no-cascade":
                $entree = App\Trajet::find((int)$requete->input('id'));
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
        return array_keys(App\Trajet::firstOrNew([])->getAttributes());
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
        $email = $requete->session()->get('utilisateur.email');
        $entrees = $this->getEntreesSimplifiesDeModeles(App\Trajet::all()->sortBy($this->attributsColonnes[0]));
        $this->donneesDynamiques = [
            'email'=>$email,
            'entrees'=>$entrees,
            'colonnes'=>[
                ['attribut'=>$this->attributsColonnes[0],'nom'=>'#', 'type'=>'id'],
                ['attribut'=>$this->attributsColonnes[1], 'nom'=>'Station départ','type'=>'cle|station'],
                ['attribut'=>$this->attributsColonnes[2],'nom'=>'Station arrivée', 'type'=>'cle|station'],
                ['attribut'=>$this->attributsColonnes[3],'nom'=>'Navire', 'type'=>'cle|navire'],
            ],
            'tables_cles_etrangeres'=>[
                'station'=>['attributs_lies'=>[$this->attributsColonnes[1], $this->attributsColonnes[2]], 'cles_etrangeres'=>[
                    1=>'Station 1',
                    2=>'Station 2',
                    3=>'Station 3',
                    4=>'Station 4',
                    5=>'Station 5',
                    6=>'Station 6',
                    7=>'Station 7',
                    8=>'Station 8',
                    9=>'Station 9',
                    10=>'Station 10',
                ]
                ],
                'navire'=>['attributs_lies'=>[$this->attributsColonnes[3]], 'cles_etrangeres'=>[
                    1=>'Navire 1',
                    2=>'Navire 2',
                    3=>'Navire 3',
                    4=>'Navire 4',
                    5=>'Navire 5',
                    6=>'Navire 6',
                    7=>'Navire 7',
                    8=>'Navire 8',
                    9=>'Navire 9',
                    10=>'Navire 10',
                ]
                ]
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

