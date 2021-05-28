<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Fiche;
use App\Prestation;
use App\Estimation;
use App\Galerie;
use Input;

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
        $listPrestation = Fiche::leftjoin('prestations','prestations.id','=','fiches.id_prestations')
        //->leftjoin('estimations','estimations.id','=','fiches.id_estimation_min')
        //->leftjoin('estimations','estimations.id','=','fiches.id_estimation_max')
        ->select('fiches.*','prestations.name as prestation','prestations.path_icone')
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



}
