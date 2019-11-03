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

    public function getDependances($recursif = true) {
        $dependances = [];

        $dependancesTables = $this->getDependancesDirectes();
        if (!$recursif) {
            return $dependancesTables;
        }
        foreach ($dependancesTables as $dependancesTable) {
            foreach ($dependancesTable as $dependanceObjet) {
                array_push($dependances, ['dependancePrimaire' => $dependanceObjet, 'dependancesSecondaires' => []]);
                $dependances[count($dependances)-1]['dependancesSecondaires'] = $dependanceObjet->getDependances();
            }
        }

        return $dependances;
    }
}
