<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

abstract class ModeleParent extends Model
{

    protected abstract function getDependancesDirectes();

    public function getDependances($recursif = true) {
        $dependances = [];

        $dependancesObjets = $this->getDependancesDirectes();
        if (!$recursif) {
            return $dependancesObjets;
        }
        foreach ($dependancesObjets as $dependanceObjet) {
            array_push($dependances, ['dependancePrimaire' => $dependanceObjet, 'dependancesSecondaires' => []]);
            array_push($dependances[count($dependances)-1]['dependancesSecondaires'],$dependanceObjet->getDependances());
        }
        return $dependances;
    }
}
