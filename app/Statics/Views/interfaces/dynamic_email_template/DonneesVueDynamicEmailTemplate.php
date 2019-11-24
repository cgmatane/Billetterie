<?php

namespace App\Statics\Views\interfaces\dynamic_email_template;

use App\Statics\Views\DonneesVue;

class DonneesVueDynamicEmailTemplate extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->nomVue = 'dynamic_email_template';
        $this->setDonneeVue('bonjour',['Bonjour', 'Hello']);
        $this->setDonneeVue('remerciement_achat',['La Société des Traversiers Québec vous remercie pour votre achat', 'The STQ thanks you for your purchase']);
        $this->setDonneeVue('traverse_lieu',['Votre traverse aura lieu le', 'Your trip will take place on']);
        $this->setDonneeVue('a',['à','at']);
        $this->setDonneeVue('partant_de',['Partant de', 'Starting from']);
        $this->setDonneeVue('a_destination_de',['à destination de', 'to']);
        $this->setDonneeVue('telecharger_billet',['Téléchargez votre billet en pièce jointe', 'Download your ticket in the attachment']);
        $this->setDonneeVue('embarquement',['N\'oubliez pas de vous présenter à l\'embarquement 15 minutes avant l\'heure inscrite sur vos billets.',
            'Don\'t forget to be present in the boarding 15 minutes before the hour displayed on your ticket.']);
    }
}
