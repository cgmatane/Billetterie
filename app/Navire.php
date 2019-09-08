<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navire extends Model
{
    protected $table = 'navire'; /*Definit le nom de la table de la BD correspondant a associer au modele
                                        (par defaut la valeur de $table est le nom de la classe en snake case suivit d'un s)*/
}
