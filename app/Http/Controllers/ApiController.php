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

    public function getPrestataires(){
        $listPrestataire = Fiche::leftjoin('prestations','prestations.id','=','fiches.id_prestations')
        //->leftjoin('estimations','estimations.id','=','fiches.id_estimation_min')
        //->leftjoin('estimations','estimations.id','=','fiches.id_estimation_max')
        ->select('fiches.*','prestations.name as prestation','prestations.path_icone')
        ->get();
        //dd($listPrestataire);
        return response()->json(['statu'=>1, 'listPrestataire' => $listPrestataire]);
    }

    public function fisrtPrestataires(Request $request){
        $id = $request['id_user'];
        $firstPrestataire = Fiche::where('id_user',$id)
        ->leftjoin('prestations','prestations.id','=','fiches.id_prestations')
        //->leftjoin('estimations','estimations.id','=','fiches.id_estimation_min')
        //->leftjoin('estimations','estimations.id','=','fiches.id_estimation_max')
        ->select('fiches.*','prestations.name as prestation','prestations.path_icone')
        ->get();
        //dd($listPrestataire);
        return response()->json(['statu'=>1, 'firstPrestataire' => $firstPrestataire]);
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
