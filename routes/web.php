<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/choix/date', 'FrontEndController@choixDate')->name('choix_date');

Route::get('/choix/depart', 'FrontEndController@choixDepart')->name('choix_depart');

Route::get('/informations', 'FrontEndController@informations')->name('informations');

Route::get('/informations/animaux', 'FrontEndController@informationsAnimaux')->name('informations_animaux');

Route::get('/informations/matieres', 'FrontEndController@informationsMatieres')->name('informations_matieres');

Route::get('/choix/autre_vehicule', 'FrontEndController@reservationChoixAutreVehicule')->name('reservation_choix_autre_vehicule');

Route::get('/choix/horaires_depart', 'FrontEndController@reservationChoixHoraireDepart')->name('reservation_choix_horaire_depart');

Route::get('/choix/remorque', 'FrontEndController@reservationChoixRemorque')->name('reservation_choix_remorque');

Route::get('/choix/vehicule', 'FrontEndController@reservationChoixVehicule')->name('reservation_choix_vehicule');

Route::get('/choix/voiture', 'FrontEndController@reservationChoixVoiture')->name('reservation_choix_voiture');

Route::get('/reservation/confirmation', 'FrontEndController@reservationConfirmation')->name('reservation_confirmation');

Route::get('/choix/matieres_dangereuses', 'FrontEndController@reservationMatieres')->name('reservation_matieres');

Route::get('/reservation/paiement', 'FrontEndController@reservationPaiement')->name('reservation_paiement');

Route::get('/reservation/passagers', 'FrontEndController@reservationPassagers')->name('reservation_passagers');

Route::get('/choix/poids_vehicule', 'FrontEndController@reservationPoids')->name('reservation_poids');

Route::get('/', 'FrontEndController@accueil')->name('index');
