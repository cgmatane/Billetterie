<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passager extends ModeleParent
{
    protected $table = 'passager';
    protected $primaryKey = 'id_passager';

    protected $guarded = ['id_passager'];

    public $timestamps = false;

    public function getNomAffiche()
    {
        return "Passager ".$this->nom;
    }

    public function ticket() {
        return Ticket::find($this->id_ticket);
    }

    protected function getDependancesDirectes()
    {
        return array();
    }
}

