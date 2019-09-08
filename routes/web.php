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
    return view('pages.welcome');
});

Route::get('/achat', function () {
    return view('pages.achat');
});

Route::get('/connexion', function () {
    return view('pages.connexion');
});

Route::get('/contact', function () {
    return view('pages.contact');
});
