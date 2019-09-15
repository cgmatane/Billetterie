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

Route::get('/choix/date', function () {
    return view('pages.choix_date');
})->name('choix_date');

Route::get('/choix/depart', function () {
    return view('pages.choix_depart');
})->name('choix_depart');

Route::get('/informations', function () {
    return view('pages.informations');
})->name('informations');

Route::get('/informations/animaux', function () {
    return view('pages.informations_animaux');
})->name('informations_animaux');

Route::get('/informations/matieres', function () {
    return view('pages.informations_matieres');
})->name('informations_matieres');

Route::get('/choix/autre_vehicule', function () {
    return view('pages.reservation_choix_autre_vehicule');
})->name('reservation_choix_autre_vehicule');

Route::get('/choix/horaires_depart', function () {
    return view('pages.reservation_choix_horaire_depart');
})->name('reservation_choix_horaire_depart');

Route::get('/choix/remorque', function () {
    return view('pages.reservation_choix_remorque');
})->name('reservation_choix_remorque');

Route::get('/choix/vehicule', function () {
    return view('pages.reservation_choix_vehicule');
})->name('reservation_choix_vehicule');

Route::get('/choix/voiture', function () {
    return view('pages.reservation_choix_voiture');
})->name('reservation_choix_voiture');

Route::get('/reservation/confirmation', function () {
    return view('pages.reservation_confirmation');
})->name('reservation_confirmation');

Route::get('/choix/matieres_dangereuses', function () {
    return view('pages.reservation_matieres');
})->name('reservation_matieres');

Route::get('/reservation/paiement', function () {
    return view('pages.reservation_paiement');
})->name('reservation_paiement');

Route::get('/reservation/passagers', function () {
    return view('pages.reservation_passagers');
})->name('reservation_passagers');

Route::get('/choix/poids_vehicule', function () {
    return view('pages.reservation_poids');
})->name('reservation_poids');

Route::get('/', 'FrontEndController@accueil')->name('index');
