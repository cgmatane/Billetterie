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

Route::get('/', function () {
    return view('pages.accueil');
})->name('index');

Route::get('/choix_date', function () {
    return view('pages.choix_date');
})->name('choix_date');

Route::get('/choix_depart', function () {
    return view('pages.choix_depart');
})->name('choix_depart');

Route::get('/informations', function () {
    return view('pages.informations');
})->name('informations');

Route::get('/informations_animaux', function () {
    return view('pages.informations_animaux');
})->name('informations_animaux');

Route::get('/informations_matieres', function () {
    return view('pages.informations_matieres');
})->name('informations_matieres');

Route::get('/reservation_choix_autre_vehicule', function () {
    return view('pages.reservation_choix_autre_vehicule');
})->name('reservation_choix_autre_vehicule');

Route::get('/reservation_choix_horaire_depart', function () {
    return view('pages.reservation_choix_horaire_depart');
})->name('reservation_choix_horaire_depart');

Route::get('/reservation_choix_remorque', function () {
    return view('pages.reservation_choix_remorque');
})->name('reservation_choix_remorque');

Route::get('/reservation_choix_vehicule', function () {
    return view('pages.reservation_choix_vehicule');
})->name('reservation_choix_vehicule');

Route::get('/reservation_choix_voiture', function () {
    return view('pages.reservation_choix_voiture');
})->name('reservation_choix_voiture');

Route::get('/reservation_confirmation', function () {
    return view('pages.reservation_confirmation');
})->name('reservation_confirmation');

Route::get('/reservation_matieres', function () {
    return view('pages.reservation_matieres');
})->name('reservation_matieres');

Route::get('/reservation_paiement', function () {
    return view('pages.reservation_paiement');
})->name('reservation_paiement');

Route::get('/reservation_passagers', function () {
    return view('pages.reservation_passagers');
})->name('reservation_passagers');

Route::get('/reservation_poids', function () {
    return view('pages.reservation_poids');
})->name('reservation_poids');
