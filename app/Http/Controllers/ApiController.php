<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Fiche;
use App\Prestation;
use App\Estimation;
use App\Galerie;

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
        ->leftjoin('estimations','estimations.id','=','fiches.id_estimation')
        ->select('fiches.*','prestations.name as prestation','prestations.path_icone','estimations.libelle as estimation')
        ->get();
        //dd($listPrestataire);
        return response()->json(['statu'=>1, 'listPrestataire' => $listPrestataire]);
    }


    public function getSlide(Request $request){
        $id = $request->get('id');
        $listSlide = Galerie::where('id_user',$id)->get();
        //dd($listPrestataire);
        return response()->json(['statu'=>1, 'listPrestataire' => $listSlide]);
    }



}
