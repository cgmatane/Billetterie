<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App;

abstract class ModeleController extends PageController
{

    private $entreesClesEtrangeres;
    private $attributsColonnes;
    protected $nomsTypesColonnes;

    public function __construct()
    {
        parent::__construct();
        $this->attributsColonnes = $this->getNouveauModele()->getColonnes();
        $this->entreesClesEtrangeres = [];
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
                    $entree = $this->getModeleParId((int)$requete->input($this->attributsColonnes[0]));
                    $entree->update($donnees);
                }
                if ($requete->input('edition') == '0') {
                    $entree = $this->getNouveauModele();
                    $result = $entree->create($donnees);
                    $result->save();
                }

                if ($requete->input('submit') == 'supprimer') {
                    $this->gererSupression($requete);
                }

            }
            catch (\Exception $e) {
                dd($e->getMessage());
            }
        }
        return redirect($this->getNomPage());
    }

    protected final function ajouterTableClesEtrangeres($nomTable, $attributsLies, $entrees) {
        $this->entreesClesEtrangeres[$nomTable] = [];
        $this->entreesClesEtrangeres[$nomTable]['attributs_lies'] = $attributsLies;
        $this->entreesClesEtrangeres[$nomTable]['cles_etrangeres'] = $entrees;
    }

    protected final function getEntreesSimplifiesDeModeles($modeles) {
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

    private function getColonnes() {
        $colonnes = [];
        $caracteristiquesColonnes = $this->getTypesColonnes();
        foreach ($this->attributsColonnes as $cle=>$valeur) {
            $colonne = [];
            $colonne['attribut'] = $this->attributsColonnes[$cle];
            $colonne['nom'] = $caracteristiquesColonnes[$cle][0];
            $colonne['type'] = $caracteristiquesColonnes[$cle][1];
            array_push($colonnes, $colonne);
        }
        return $colonnes;
    }

    private function gererSupression(Request $requete){

        switch ($requete->type){
            case "no-cascade":
                $entree = $this->getModeleParId((int)$requete->input('id'));
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

    protected final function setDonneesDynamiques(Request $requete = null)
    {
        $email = $requete->session()->get('utilisateur.email');
        $entrees = $this->getEntreesSimplifiesDeModeles($this->getModeles()->sortBy($this->attributsColonnes[0]));
        $colonnes = $this->getColonnes();
        $this->setClesEtrangeres();
        $this->donneesDynamiques = [
            'email'=>$email,
            'entrees'=>$entrees,
            'colonnes'=>$colonnes,
            'tables_cles_etrangeres'=>$this->entreesClesEtrangeres,
        ];
    }

    protected function setClesEtrangeres() {}

    abstract protected function getTypesColonnes();

    abstract protected function getModeles();

    abstract protected function getModeleParId($id);

    abstract protected function getNouveauModele();

}
