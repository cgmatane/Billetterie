<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table = 'commande'; /*Definit le nom de la table de la BD correspondant a associer au modele
                                        (par defaut la valeur de $table est le nom de la classe en snake case suivit d'un s)*/
}
