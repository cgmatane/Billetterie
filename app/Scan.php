<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scan extends ModeleParent
{
    protected $table = 'scan'; /*Definit le nom de la table de la BD correspondant a associer au modele
                                        (par defaut la valeur de $table est le nom de la classe en snake case suivit d'un s)*/
    protected $primaryKey = 'id_scan';

    protected $guarded = ['id_scan'];

    public $timestamps = false;

    public static function getScanCourant()
    {
        return Scan::where('id_scan', 1)->first();
    }

    public function getNomAffiche()
    {
        return "Dernier Scan";
    }

    protected function getDependancesDirectes()
    {
        return null;
    }
}
