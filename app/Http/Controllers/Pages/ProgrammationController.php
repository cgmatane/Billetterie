<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;

use App\Statics\Views\interfaces\administration\DonneesVueProgrammation;
use Illuminate\Http\Request;
use App;

class ProgrammationController extends PageController
{

    private $attributsColonnes;
    private $entreesClesEtrangeres;

    public function __construct() {
        parent::__construct();
        $this->setNomPage('administration/programmation');
        $this->setDonneesStatiques(new DonneesVueProgrammation());
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
                    $entree = App\Programmation::find((int)$requete->input($this->attributsColonnes[0]));
                    $entree->update($donnees);
                }
                if ($requete->input('edition') == '0') {
                    $entree = new App\Programmation();
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
        return redirect(route("administration.programmation"));
    }

    private function gererSupression(Request $requete){

        switch ($requete->type){
            case "no-cascade":
                $entree = App\Programmation::find((int)$requete->input('id'));
                try {
                    $dependances = $entree->getDependances();
                }
                catch (\Exception $e) {
                    dd($e->getMessage());
                }

                if (count($dependances) == 0){
                    $entree->delete();
                    return null;
                }else{

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
        return array_keys(App\Programmation::firstOrNew([])->getAttributes());
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
        $email = $requete->session()->get('utilisateur.email');
        $entrees = $this->getEntreesSimplifiesDeModeles(App\Programmation::all()->sortBy($this->attributsColonnes[0]));
        $this->donneesDynamiques = [
            'email'=>$email,
            'entrees'=>$entrees,
            'colonnes'=>[
                ['attribut'=>$this->attributsColonnes[0],'nom'=>'#', 'type'=>'id'],
                ['attribut'=>$this->attributsColonnes[1], 'nom'=>'Trajet','type'=>'text'],
                ['attribut'=>$this->attributsColonnes[2], 'nom'=>'Date départ','type'=>'date'],
                ['attribut'=>$this->attributsColonnes[3], 'nom'=>'Date arrivée','type'=>'date'],
                ['attribut'=>$this->attributsColonnes[4], 'nom'=>'Nom','type'=>'text'],
                ['attribut'=>$this->attributsColonnes[5], 'nom'=>'Annulé','type'=>'bool'],
            ],
            'tables_cles_etrangeres'=>[
                'trajet'=>['attributs_lies'=>[$this->attributsColonnes[1]], 'cles_etrangeres'=>[
                    1=>'Trajet 1',
                    2=>'Trajet 2',
                    3=>'Trajet 3',
                    4=>'Trajet 4',
                    5=>'Trajet 5',
                    6=>'Trajet 6',
                    7=>'Trajet 7',
                    8=>'Trajet 8',
                    9=>'Trajet 9',
                    10=>'Trajet 10',
                ]
                ],
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

