<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Auth', 'prefix' => 'authentification'], function () {

	Route::post('/login','LoginController@login');
	Route::post('/register','RegisterController@register');

});


Route::get('liste_categorie','ApiController@getCategorie');
Route::get('liste_estimation','ApiController@getEstimation');
Route::get('liste_prestation','ApiController@getPrestation');
Route::get('liste_prestataire','ApiController@getPrestataire');

Route::get('Liste_commune','ApiController@ListCommune');

Route::post('liste_slides','ApiController@getSlide');
Route::post('first_prestation','ApiController@fisrtPrestation');
Route::post('first_prestataire','ApiController@firstPrestataire');

Route::post('favoris','ApiController@Favoris');
Route::post('clicfiche','ApiController@clicfiche');
Route::post('clicphone','ApiController@clicphone');

Route::post('demande','ApiController@saveDemande');

Route::post('recherche','ApiController@serch');

Route::post('recherchePrestataire','ApiController@serchPrestataire');


Route::post('filtreEstimation','ApiController@filtreEstimation'); // en cours
Route::post('filtreCategorie','ApiController@filtreCategorie');
Route::post('filtreCommune','ApiController@filtreSituationGeo');

Route::post('saveImage','ApiController@saveImage');
Route::post('upadteProfile','ApiController@updateProfile');
Route::post('updatePassword','ApiController@updatePassword');

Route::post('liste_conversation','ApiController@getConversation');
Route::post('liste_message','ApiController@getMessage');
Route::post('message','ApiController@saveMessage');

Route::post('save_commentaire','ApiController@saveCommentaire');
Route::post('liste_commentaire','ApiController@getCommenataire');


Route::post('forgetPassword','ApiController@forgetPassword');



