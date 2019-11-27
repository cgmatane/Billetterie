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

use App\Http\Controllers\FrontEndController;


Route::get('/', function() {
    return redirect('accueil');
});

Route::get('/administration', function() {
    return redirect('/administration/vue_generale');
});

Route::get('/changer_langue', 'LangueController@setCookie')->name('changer_langue');

Route::get('/gerant_reservation', 'GerantReservationController@gerer')->name('gerant_reservation');

Route::get('affichage-pdf', 'GenerateurPdfController@creerPdf');

Route::match(array('GET', 'POST'),'/{nomRoute?}', ['uses' => 'FrontEndController@manager'])->name('manager')->where('nomRoute','.*');

Route::get('/accueil')->name('index');

Route::get('/administration/connexion')->name('administration.connexion');

Route::get('/administration/vue_generale')->name('administration.vue_generale');

Route::get('/administration/station')->name('administration.station');

Route::get('/administration/trajet')->name('administration.trajet');

Route::get('/administration/navire')->name('administration.navire');

Route::get('/administration/ticket')->name('administration.ticket');

Route::get('/administration/passager')->name('administration.passager');

Route::get('/administration/vehicule')->name('administration.vehicule');

Route::get('/administration/gardien')->name('administration.gardien');

Route::get('/date')->name('choix_date');

Route::get('/depart')->name('choix_depart');

Route::get('/autre_vehicule')->name('reservation_choix_autre_vehicule');

Route::get('/remorque')->name('reservation_choix_remorque');

Route::get('/vehicule')->name('reservation_choix_vehicule');

Route::get('/voiture')->name('reservation_choix_voiture');

Route::get('/matieres')->name('reservation_matieres');

Route::get('/poids')->name('reservation_poids');

Route::get('/paiement')->name('reservation_paiement');

Route::get('/passagers')->name('reservation_passagers');

Route::get('/confirmation')->name('reservation_confirmation');

Route::get('/infos')->name('informations');

Route::get('/validation')->name('validation_informations');

Route::get('/infos_animaux')->name('informations_animaux');

Route::get('/infos_matieres')->name('informations_matieres');

Route::get('/requete-qr')->name('requete-qr');

Route::get('/pdf')->name('pdf');

