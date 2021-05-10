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

//use Illuminate\Routing\Route;

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::get('/welcome/tableau/gesttion','PrestataireController@home')->name('prestataire');
Route::get('/infos/compte/prestatire','PrestataireController@getFiche');
Route::post('/save/compte/prestatire','PrestataireController@postFiche');
Route::get('/fiche/prestataire','PrestataireController@Fiche');
Route::post('/update/compte/prestatire','PrestataireController@updateFiche');
Route::post('/save/gallerie','PrestataireController@saveGalerie'); 
Route::get('/list/reservations','PrestataireController@getReservation'); 
Route::get('/list/messageries','PrestataireController@getMessagerie'); 


Route::get('/welcome/tableau/administrateur','AdminController@home')->name('administrateur');
Route::get('/liste/prestataires','AdminController@getPrestatire');
Route::get('/fiche/prestataires/{id}','AdminController@onePrestatire');
Route::get('/liste/reservations','AdminController@getReservation');
Route::get('/list/prestations','AdminController@getPrestations');
Route::post('/save/prestation','AdminController@savePrestation');





Route::get('/connexion','AdminController@login');
//Route::get('/administration','AdminController@home')->name('admin.login');

Route::get('/inscriptionUtilisateur',[
	'as' => 'inscriptionUtilisateur',
	'uses' => 'Utilisateurcontroler@inscriptionUtilisateur',
]);

Route::get('/inscriptionPrestataire',[
	'as' => 'inscriptionPrestataire',
	'uses' => 'PrestataireController@inscriptionPrestataire',
]);

Route::get('/confirm/{id}/{token}','Auth\RegisterController@confirm')->name('confirm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
