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

Route::get('/', 'FrontEndController@accueil')->name('index');

Route::get('/choix_liste/date', 'FrontEndController@choixDate')->name('choix_date');

Route::get('/choix_liste/depart', 'FrontEndController@choixDepart')->name('choix_depart');

Route::get('/choix_liste/autre_vehicule', 'FrontEndController@reservationChoixAutreVehicule')->name('reservation_choix_autre_vehicule');

Route::get('/choix_liste/remorque', 'FrontEndController@reservationChoixRemorque')->name('reservation_choix_remorque');

Route::get('/choix_liste/vehicule', 'FrontEndController@reservationChoixVehicule')->name('reservation_choix_vehicule');

Route::get('/choix_liste/voiture', 'FrontEndController@reservationChoixVoiture')->name('reservation_choix_voiture');

Route::get('/choix_liste/matieres_dangereuses', 'FrontEndController@reservationMatieres')->name('reservation_matieres');

Route::get('/choix_liste/poids_vehicule', 'FrontEndController@reservationPoids')->name('reservation_poids');

Route::get('/reservation/paiement', 'FrontEndController@reservationPaiement')->name('reservation_paiement');

Route::get('/reservation/passagers', 'FrontEndController@reservationPassagers')->name('reservation_passagers');

Route::get('/reservation/confirmation', 'FrontEndController@reservationConfirmation')->name('reservation_confirmation');

Route::get('/informations', 'FrontEndController@informations')->name('informations');

Route::get('/informations/animaux', 'FrontEndController@informationsAnimaux')->name('informations_animaux');

Route::get('/informations/matieres', 'FrontEndController@informationsMatieres')->name('informations_matieres');
