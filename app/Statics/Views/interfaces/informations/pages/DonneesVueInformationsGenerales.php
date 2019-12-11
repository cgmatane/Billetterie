<?php

namespace App\Statics\Views\interfaces\informations\pages;

use App\Statics\Views\interfaces\informations\DonneesVueInformations;

class DonneesVueInformationsGenerales extends DonneesVueInformations
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->setDonneeVue('titre', ['Informations', 'Informations']);
        $this->setDonneeVue('a_savoir', ['À savoir avant de partir : ', 'What your need to know before departure : ']);
        $this->setDonneeVue('conditions_climatiques', ['Que ce passe-t-il en cas d\'annulation de mon trajet ?', 'What happens if my trip is canceled ?']);
        $this->setDonneeVue('traverses_annulees', ['Elles peuvent donc êtres annulées à tout moment', 'This means they can be cancelled any time']);
        $this->setDonneeVue('cas_annulation', ['En cas d\'annulation, ne vous inquiétez pas vous receverez un email immédiatement et vous serez remboursé automatiquement !','In case of cancellation, dont worry you will receive an email and you will be refund automatically!']);
        $this->setDonneeVue('question_embarquement', ['Que doit-on présenter lors de l\'embarquement si nous avons réservé par Internet ? ', 'What must be presented when boarding if we booked via the Internet ?']);
        $this->setDonneeVue('reponse_embarquement', ['Vous devez présenter au préposé votre copie de facture, qui vous a été envoyée dans votre courriel', 'You must present to the agent your invoice copy, which was sent to you in your email']);
        $this->setDonneeVue('question_remboursement', ['J\'ai fait une réservation pour la traverse de Matane et je ne pourrai pas m\'y présenter. Est-ce que l\'acompte que j\'ai payé me sera remboursé ?', 'I made a reservation for the Matane ferry and I will not be able to attend. Will the down payment I paid be refunded ?']);
        $this->setDonneeVue('reponse_remboursement', ['Oui, seulement si l\'annulation est faite avant 15 h la veille de votre départ. Passé ce délai, l\'acompte ne sera pas remboursé.', 'Yes, only if the cancellation is made before 3 pm the day before your departure. After this period, the deposit will not be refunded.']);
        //$this->setDonneeVue('question_remboursement', ['', '']);
        $this->setDonneeVue('question_confirmation', ['Suite à une réservation, vais-je recevoir une confirmation quelconque ?', 'Following a reservation, will I receive any confirmation ?']);
        $this->setDonneeVue('reponse_confirmation', ['Oui. Une confirmation par courriel vous sera envoyée. De cette façon, vous aurez le choix d\'imprimer votre billet ou de le présenter à la traverse directement de votre écran de téléphone.', 'Yes. An email confirmation will be sent to you. This way, you will have the choice of printing your ticket or presenting it to the ferry directly from your phone screen.']);
        $this->setDonneeVue('question_transaction', ['J\'ai fait une transaction mais je n\'ai pas reçu de courriel de confirmation. Pourquoi ?', 'I made a transaction but I did not receive a confirmation email. Why ?']);
        $this->setDonneeVue('reponse_transaction', ['Il est possible que le courriel soit tombé dans votre boîte d\'indésirables. Sinon, il se peut que vous ayez mal entré votre adresse courriel. Dans un pareil cas, il vous faudra communiquer avec nous par mail.', 'It is possible that the email has fallen into your inbox. Otherwise, you may have entered your email address incorrectly. In such a case, you will have to communicate with us by email.']);
        $this->setDonneeVue('question_traverse', ['Où puis-je trouver les informations de chacune des traverses ?', 'Where can I find information on each of the sleepers ?']);
        $this->setDonneeVue('reponse_traverse', ['Vous pouvez obtenir des informations détaillées sur les traverses en appuyant sur le bouton information disponible à la droite de chaque traverse.', 'You can get detailed information on the sleepers by pressing the information button on the right of each crossbar.']);
        $this->setDonneeVue('question_contact', ['Comment puis-je joindre la STQ ?', 'How can I contact STQ ?']);
        $this->setDonneeVue('reponse_contact', ['En cas de problème, vous pouvez joindre la STQ par mail à l\'adresse kirk@gmail.com', 'In case of problem, you can reach the STQ by email at kirk@gmail.com']);
        $this->setDonneeVue('presentation_embarquement', ['Vous devez vous présenter à l\'embarquement 15 minutes avant l\'heure de départ','You have to get aboard 15 minutes before the hour of departure']);
        $this->setDonneeVue('titre_page', ['Billetterie - Informations','Ticketing - Informations']);
    }
}
