<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Fiche;
use App\Prestation;
use App\Estimation;
use App\Galerie;
use App\Favori;
use App\Clicfiche;
use App\Clicphone;
use App\Demande;
use App\Mail\notifixation;
use Input;
use Illuminate\Support\Facades\Mail;
use DB;


class ApiController extends Controller
{
    //

    public function getUsers(){
        $listUser = User::all();
        return response()->json(['statu'=>1, 'listUser' => $listUser]);
    }

    public function getCategorie(){
        $listCategorie = Prestation::all();
        return response()->json(['statu'=>1, 'listCategorie' => $listCategorie]);

    }

    public function getEstimation(){
        $listEstiomation = Estimation::all();
        return response()->json(['statu'=>1, 'listCategorie' => $listEstiomation]);
    }

    public function getPrestation(){
        $listPrestation = Fiche::where('statu_fiche', '!=' ,'0')->leftjoin('prestations','prestations.id','=','fiches.id_prestations')
        //->leftjoin('estimations','estimations.id','=','fiches.id_estimation_min')
        //->leftjoin('estimations','estimations.id','=','fiches.id_estimation_max')
        ->select('fiches.*','prestations.name as prestation','prestations.path_icone')
        ->orderBy('fiches.id', 'desc')
        ->get();
        //dd($listPrestataire);
        return response()->json(['statu'=>1, 'listPrestation' => $listPrestation]);
    }

    public function getPrestataire(){
        $listPrestataire = User::where('role',2)
        ->where('confirmation_token', NULL)
        ->leftjoin('fiches','fiches.id_user','=','users.id')
        ->leftjoin('prestations','prestations.id','=','fiches.id_prestations')
        //->leftjoin('estimations','estimations.id','=','fiches.id_estimation_min')
        //->leftjoin('estimations','estimations.id','=','fiches.id_estimation_max')
        ->select('users.*','fiches.name as name_entreprise','fiches.id_user','prestations.name as prestation','prestations.path_icone')
        ->get();
        //dd($listPrestataire);
        return response()->json(['statu'=>1, 'listPrestataire' => $listPrestataire]);
    }

    public function firstPrestataire(Request $request){
        $id = $request['id_user'];
        $listPrestataire = User::where('users.id',$id)
        ->where('confirmation_token', NULL)
        ->leftjoin('fiches','fiches.id_user','=','users.id')
        ->leftjoin('prestations','prestations.id','=','fiches.id_prestations')
        //->leftjoin('estimations','estimations.id','=','fiches.id_estimation_min')
        //->leftjoin('estimations','estimations.id','=','fiches.id_estimation_max')
        ->select('users.*','fiches.name as name_entreprise','fiches.id_user','prestations.name as prestation','prestations.path_icone')
        ->get();
        //dd($listPrestataire);
        //return $id;
        return response()->json(['statu'=>1, 'listPrestataire' => $listPrestataire]);
    }



    public function fisrtPrestation(Request $request){
        $id = $request['id_user'];
        $firstPrestation = Fiche::where('id_user',$id)
        ->leftjoin('prestations','prestations.id','=','fiches.id_prestations')
        //->leftjoin('estimations','estimations.id','=','fiches.id_estimation_min')
        //->leftjoin('estimations','estimations.id','=','fiches.id_estimation_max')
        ->select('fiches.*','prestations.name as prestation','prestations.path_icone')
        ->get();
        //dd($listPrestataire);
        return response()->json(['statu'=>1, 'firstPrestation' => $firstPrestation]);
    }

    public function Favoris(Request $request){
        
        $data =  $request->all();
        // dd($data);
        $id_user = $request['id_user'];
        $id_pres = $request['id_pres'];

        $favoris = Favori::where('id_user', $id_user)
                   ->where('id_prestataire',$id_pres)
                   ->first();

        //dd($favoris);
        
        if($favoris){
            Favori::where('id_user', $id_user)->where('id_prestataire', $id_pres)->delete();
            $statu = 2;
        }else{
            Favori::create([
                'id_user' => $id_user,
                'id_prestataire' => $id_pres,
            ]);
            $statu = 1;
        }

        $listeFavoris = Favori::where('id_user', $id_user)->get();

        return response()->json(['statu'=> $statu, 'listeFavoris' => $listeFavoris]);
        
    }

    public function clicfiche(Request $request){
        try{
            $id_user = $request['id_user'];
            $id_pres = $request['id_pres'];

            Clicfiche::create([
                'id_user' => $id_user,
                'id_prestataire' => $id_pres,
            ]);
            $statu = 1;

            return response()->json(['statu'=> $statu]);

        } catch (Exception $e) {
            $statu = 0;
            return response()->json(['statu'=> $statu ,'erreur' => $e]);
        }

    }

    public function clicphone(Request $request){
        try{
            $id_user = $request['id_user'];
            $id_pres = $request['id_pres'];

            Clicphone::create([
                'id_user' => $id_user,
                'id_prestataire' => $id_pres,
            ]);
            $statu = 1;

            return response()->json(['statu'=> $statu]);

        } catch (Exception $e) {
            $statu = 0;
            return response()->json(['statu'=> $statu ,'erreur' => $e]);
        }

    }


    public function saveDemande(Request $request){
        
        try{

            //$request=$request->all();
            //dd($request);
           
            $id_pres = $request['id_pres'];
            $name = $request['name'];
            $phone = $request['phone'];
            $email = $request['email'];
            $message = $request['message'];

            Demande::create([
                'id_prestataire' => $id_pres,
                'name' => $name,
                'phone' => $phone,
                'email' => $email,
                'message' => $message,
                'statu' => 0,
            ]);

            $infoPrestataire  = DB::table('users')->where('id',$id_pres)->first();

            $statu = 1;
            $messages = "Votre demandé a bien été transmit au prèstatire !";

            $data = [
                'name' => $infoPrestataire->name,
                'email' => $infoPrestataire->email,
                'phone' => $infoPrestataire->phone,
            ];

            // communication mail pas defaut
            Mail::to($infoPrestataire->email)->send(new notifixation($data));

            // communication sms pour ceux dont l'option telephon est Activité 

            return response()->json(['statu'=> $statu, 'messages' => $messages]);

        } catch (Exception $e) {
            $statu = 0;
            return response()->json(['statu'=> $statu ,'erreur' => $e]);
        }

    }


    public function getSlide(Request $request){
        
        //$data = Request::json();
        $request=$request->all();
        response()->json([
            'request' => $request
        ]);
        $id = $request['id_user'];
        
       
        $listSlide = Galerie::where('id_user',$id)->get();
        //dd($listPrestataire);
        return response()->json(['statu'=>1, 'listPrestataire' => $listSlide]);
    }

    public function serch(Request $request){

        $id_prestation = $request['id_prestation'];
        $localisation = $request['localisation'];
        $estmation_max = $request['estmation_max'];
        $estmation_min = $request['estmation_min'];

        $resultat = Fiche::where('statu_fiche', '!=' ,'0')
        ->where('id_prestations',$id_prestation)
        ->where('localisation','like','%'.$localisation.'%')
        //->whereBetween('estimation_min', [$estmation_min,$estmation_max])
        //->whereBetween('estimation_max', [$estmation_min, $estmation_max])
        //->where('estimation_max','<=',$estmation_max)
        ->leftjoin('prestations','prestations.id','=','fiches.id_prestations')
        ->select('fiches.*','prestations.name as prestation','prestations.path_icone')
        ->orderBy('fiches.id', 'desc')
        ->get();

        if(count($resultat) == '0'){
            $message = "resultat disponible";
            return response()->json(['statu'=>1,'message' => $message, 'resultat' => $resultat]);
        }else{
            $message = "resultat vide";
            return response()->json(['statu'=>0, 'message' => $message,'resultat' => $resultat]);
        }
        


    }

    public function filtreCategorie(Request $request){

        $id_prestation = $request['id_prestation'];
       
        $resultat = Fiche::where('statu_fiche', '!=' ,'0')
        ->where('id_prestations',$id_prestation)
        ->leftjoin('prestations','prestations.id','=','fiches.id_prestations')
        ->select('fiches.*','prestations.name as prestation','prestations.path_icone')
        ->orderBy('fiches.id', 'desc')
        ->get();

        //dd(count($resultat));

        if(count($resultat) != '0'){
            $message = "resultat disponible";
            return response()->json(['statu'=>1,'message' => $message, 'resultat' => $resultat]);
        }else{
            $message = "resultat vide";
            return response()->json(['statu'=>0, 'message' => $message,'resultat' => $resultat]);
        }
        


    }

    public function filtreEstimation(Request $request){

        $estmation_max = $request['estmation_max'];
        $estmation_min = $request['estmation_min'];

        $resultat = Fiche::select('*')
        ->where('statu_fiche', '!=' ,'0')
        ->where('estimation_min', '=', $estmation_min)
        ->where('estimation_max', '<=', $estmation_max)
        //->whereBetween('estimation_max', [$estmation_min, $estmation_max])
        //->where('estimation_max','<=',$estmation_max)
        //->leftjoin('prestations','prestations.id','=','fiches.id_prestations')
        //->leftjoin('estimations','estimations.id','=','fiches.id_estimation_min')
        //->leftjoin('estimations','estimations.id','=','fiches.id_estimation_max')
        //->select('fiches.*','prestations.name as prestation','prestations.path_icone')
        ->orderBy('fiches.id', 'desc')
        ->get();

        if(count($resultat) == '0'){
            $message = "resultat disponible";
            return response()->json(['statu'=>1,'message' => $message, 'resultat' => $resultat]);
        }else{
            $message = "resultat vide";
            return response()->json(['statu'=>0, 'message' => $message,'resultat' => $resultat]);
        }
        


    }



}
