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

Route::get('/welcome/tableau/gesttion/{id}','PrestataireController@home')->name('prestataire');
Route::get('/infos/compte/prestatire/{id}','PrestataireController@getFiche');
Route::post('/save/compte/prestatire','PrestataireController@postFiche');
Route::get('/fiche/prestataire/{id}','PrestataireController@Fiche');
Route::post('/update/compte/prestatire','PrestataireController@updateFiche');

Route::post('/save/gallerie','PrestataireController@saveGalerie');
Route::get('/list/demande/{id}','PrestataireController@getReservation');
Route::get('/list/messageries/{id}','PrestataireController@getMessagerie');

Route::post('/save/gallerie/','PrestataireController@saveGalerie');

Route::post('/add/gallerie','PrestataireController@addGaleri');

Route::post('/update/image','PrestataireController@updateImage');
Route::post('/delet/image','PrestataireController@deletImage');


Route::get('mise_a_jour_image/{id}','PrestataireController@editImage');

Route::get('/welcome/tableau/administrateur/{id}','AdminController@home')->name('administrateur');
Route::get('/liste/prestataires/{id}','AdminController@getPrestatire');
Route::get('/fiche/prestataires/{id}/{user}','AdminController@onePrestatire');
Route::get('/liste/demandes/{id}','AdminController@getAlldemande');
Route::get('/list/prestations/{id}','AdminController@getPrestations');
Route::get('/statistique/{id}','AdminController@statiatique');
Route::post('/save/prestation','AdminController@savePrestation');
Route::post('/save/parametre','AdminController@saveParametre');
Route::get('/Contenus/{id}','AdminController@listContenus'); 
Route::get('/Publicite/{id}','AdminController@listPublicite'); 

Route::get('/fiche_actif/{id}','AdminController@listficheactif');
Route::get('/fiche_non_actif/{id}','AdminController@listfichenonactif');

Route::get('/smsenvojer/{id}','AdminController@smsEnvoye');
Route::get('/Commentaire/{id}','AdminController@listCommentaire');

Route::post('/update/contenus','AdminController@updateContenus');
Route::post('/delet/user','AdminController@deletUser');
Route::post('/delet/fiche','AdminController@deletfiche'); 

Route::get('/messageries/{id}','AdminController@message');
Route::get('/listPrestatiaire/{id}','AdminController@listeprestatire');
Route::get('/utilisateurs/{id}','AdminController@listeutilisateur');
Route::get('/Categorie/{id}','AdminController@categorie');
Route::get('/Commentaire/{id}','AdminController@listCommentaire');
Route::get('/Estimation/{id}','AdminController@estimation');
Route::get('/liste_message/{code}','AdminController@getmessage');
Route::get('/new_message/{emetteur}/{recepteur}','AdminController@newMessage');
Route::post('/save/message','AdminController@saveMessage');

Route::post('/save/message/prestataire','PrestataireController@saveMessage');
Route::post('/save/categorie','AdminController@saveCategorie');
Route::post('/update/categorie','AdminController@updateCategorie');
Route::post('/save/estimation','AdminController@saveEstimation');
Route::post('/update/estimation','AdminController@updateEstimation'); 
Route::get('/activer/profil/{id}','AdminController@profilactif');
Route::post('/update/imagepub','AdminController@updateImagepub');

Route::get('/smsenvojer/{id}','AdminController@smsEnvoye');

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


Route::get('/{any}', 'SinglePageController@index')->where('any', '.*');


Route::post('/save/profil','UserController@saveProfil');
Route::post('/save/password','UserController@savePassword');
Route::post('/updade/img/profile','UserController@updateImgProfile');
