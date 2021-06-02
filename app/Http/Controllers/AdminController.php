<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Prestation;
use App\Fiche;
use App\User;
use App\Galerie;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //

    public function prestataire(){
        $listePrestation = Fiche::all();
        return $listePrestation;
    }

    public function prestations(){
        $listePrestation = Prestation::all();
        return $listePrestation;
    }

    public function login(){
        //$listePrestation = Prestation::get();
        return view('admin.login');
    }

    public function Userinfo($id){
        $infoUser = User::where('id',$id)->first();
        return  $infoUser;
    }

    public function home($id){
       
        //dd();
        $infoUser = User::where('id',$id)->first();
        //dd($infoUser->name);
        return view('admin.home', compact('infoUser'));
    }

    public function getPrestatire($id){

        $infoUser = $this->Userinfo($id);

        $listePrestation = Db::table('fiches')
                        ->leftjoin('users','users.id','=','fiches.id_user')
                        ->select('users.name as nom','users.phone as numero','fiches.*')
                        ->orderBy('fiches.id', 'desc')
                        ->get();

        return view('admin.list_prestataire',compact('listePrestation','infoUser'));
    }

    public function galerie($id){
        $galerie = Galerie::where('id_user','=',$id)->get();
        return $galerie;
    }

    public function onePrestatire($id,$user){
        $infoUser = $this->Userinfo($user);
        $prestataire = DB::table('fiches')
                        ->where('fiches.id',$id)
                        ->leftjoin('users','users.id','=','fiches.id_user')
                        //->leftjoin('galeries','galeries.id_user','fiches.id_user')
                        ->select('users.name as nom','users.email as adresse','users.id as id_user','users.phone as numero','fiches.*')
                        ->first();

        $galerie = $this->galerie($prestataire->id_user);
        //dd( $galerie);

        return view('admin.fiche_prestataire',compact('prestataire','galerie','infoUser'));
    }

    public function getReservation(){
        return view('admin.list_reservations');
    }

    public function getPrestations(){
        $prestations =  $this->prestations();
        return view('admin.list_prestation',compact('prestations'));
    }

    public function saveParametre(Request $request){
        try{

            //dd($request->all());
            $id_fiche = $request->get('id_fiche');

            $activation = $request->get('activation');
            $position = $request->get('position');
            $messagerie = $request->get('messagerie');
            $favoris = $request->get('favoris');
            

            $firstFiche = Fiche::where('id',$id_fiche)->first();

            //if($activation AND $activation != $firstFiche->statu_fiche){
                Fiche::where('id',$id_fiche)->update(['statu_fiche' => $activation]);
            //}

            //if($position AND $position != $firstFiche->position){
                Fiche::where('id',$id_fiche)->update(['position' => $position]);
            //}

            //if($messagerie AND $messagerie != $firstFiche->messagerie){
                Fiche::where('id',$id_fiche)->update(['messagerie' => $messagerie]);
            //}

            //if($favoris AND $favoris != $firstFiche->favoris){
                Fiche::where('id',$id_fiche)->update(['favoris' => $favoris]);
            //}

            return redirect()->back()->with('success', 'Opération éffectué avec succès.');

        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.'.$th);
        }
        

    }

    public function savePrestation(Request $request){
        try {

            //dd($request->all());
           
                
                $image = $request->file('image');
                //dd($image);
                $image_icone = $input['imagename'] = time(). '.' . $image->getClientOriginalName();
                $destination = public_path('/image');
                $image->move($destination, $input['imagename']);
         

            

            $prestation = New Prestation;

            $prestation->name = $request->get('name');
            $prestation->path_icone = $image_icone;
            $prestation->description = $request->get('description');
            $prestation->statu = 0;

            $prestation->save();
            //code...
            return redirect()->back()->with('success', 'Opération éffectué avec succès.');

        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.'.$th);
        }
    }
}
