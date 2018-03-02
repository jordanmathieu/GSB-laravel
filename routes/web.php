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

/**
Route::get('/', function () {
    return view('welcome');
});

 **/

Route::get("/login", "VisiteursController@login")->name("visiteur.login");
Route::post("/login", "VisiteursController@check")->name("visiteur.check");



Route::group(["middleware" => ["Auth"]], function() {

    Route::get("/", function() {
        return view("gsb.index");
    });

    Route::get("/logoff", "VisiteursController@logoff")->name("visiteur.logoff");
});