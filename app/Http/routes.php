<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PageController@index');
Route::get('/home', 'PageController@home');
// Inscription - Connexion - Profile
Route::any('inscription', 'ConnexionController@inscription');
Route::get('profile', 'ConnexionController@profile');
Route::any('profile/update', 'ConnexionController@updateProfile');
Route::any('home/connexion', 'ConnexionController@connexion');
Route::get('user/logout', 'PageController@logout');
Route::any('search/club', 'SearchController@autocomplete');



/*
|--------------------------------------------------------------------------
| Login Pages
|--------------------------------------------------------------------------
*/

Route::get('/timeline/{surname}{name}', 'PageController@timeline');
Route::any('upload', 'PageController@postUpload');
Route::any('add/game/{id}', 'PageController@addGame');
Route::any('game/validation', 'GameController@create');
Route::any('game/{id}', 'GameController@show');
Route::any('game/analyse/{id}/{userId}', 'GameController@analyse');
Route::post('game/analyse/add', 'GameController@addAnalyse');
Route::get('statistiques/{id}', 'PageController@statistiques');
