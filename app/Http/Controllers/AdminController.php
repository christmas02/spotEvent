<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestation;
use App\Fiche;
use App\Galerie;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //

    public function prestataire(){
        $listePrestation = Fiche::all();
        return $listePrestation;
    }

    public function login(){
        //$listePrestation = Prestation::get();
        return view('admin.login');
    }

    public function home(){
        return view('admin.home');
    }

    public function getPrestatire(){

        $listePrestation = Db::table('fiches')
                        ->leftjoin('users','users.id','=','fiches.id_user')
                        ->select('users.name as nom','users.phone as numero','fiches.*')
                        ->orderBy('fiches.id', 'desc')
                        ->get();

        return view('admin.list_prestataire',compact('listePrestation'));
    }

    public function galerie($id){
        $galerie = Galerie::where('id_user','=',$id)->get();
        return $galerie;
    }

    public function onePrestatire($id){

        $prestataire = DB::table('fiches')
                        ->where('fiches.id',$id)
                        ->leftjoin('users','users.id','=','fiches.id_user')
                        //->leftjoin('galeries','galeries.id_user','fiches.id_user')
                        ->select('users.name as nom','users.email as adresse','users.id as id_user','users.phone as numero','fiches.*')
                        ->first();

        $galerie = $this->galerie($prestataire->id_user);
        //dd( $galerie);

        return view('admin.fiche_prestataire',compact('prestataire','galerie'));
    }

    public function getReservation(){
        return view('admin.list_reservations');
    }
}
