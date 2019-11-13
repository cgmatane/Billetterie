<?php


namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

abstract class ModeleParent extends Model
{

    protected $attributNom;

    protected abstract function getDependancesDirectes();

    public abstract function getNomAffiche();

    public static function getNomTable()
    {
        return with(new static)->getTable();
    }

    public function getColonnes()
    {

        $query = "SELECT column_name FROM information_schema.columns WHERE table_name = '".$this->getTable()."'";
        $colonnes = array();

        $nomColonne = 'column_name';

        foreach(DB::select($query) as $colonne) {
            array_push($colonnes, $colonne->$nomColonne);
        }
        return $colonnes;
    }

    public function possedeDependances() {
        $dependancesTables = $this->getDependancesDirectes();
        foreach ($dependancesTables as $dependancesTable) {
            foreach ($dependancesTable as $dependancesObjet) {
                if ($dependancesObjet != null)
                    return true;
            }
        }
        return false;
    }

    public function getDependances(&$dependances = [], $profondeur = 0) {

        $dependancesTables = $this->getDependancesDirectes();
        foreach ($dependancesTables as $dependancesTable) {
            foreach ($dependancesTable as $dependanceObjet) {
                if ($dependanceObjet == null)
                    continue;
                $nomDependanceCourante = "";
                for ($i = 0;$i<$profondeur;$i++) {
                    $nomDependanceCourante .= "&nbsp;&nbsp;&nbsp;&nbsp;";
                }
                $nomDependanceCourante .= $dependanceObjet->getNomAffiche();
                array_push($dependances, $nomDependanceCourante);
                $dependanceObjet->getDependances($dependances, $profondeur+1);
                //array_push($dependances, ['dependancePrimaire' => $dependanceObjet->getNomAffiche(), 'dependancesSecondaires' => []]);
                //$dependances[count($dependances)-1]['dependancesSecondaires'] = $dependanceObjet->getDependances();
            }
        }



        return $dependances;
    }
}
