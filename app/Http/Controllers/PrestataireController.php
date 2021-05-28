<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Fiche;
use App\Galerie;
use App\Prestation;
use App\Estimation;


class PrestataireController extends Controller
{
    //

    public function inscriptionPrestataire()
    {
       $data=[];

       return view('template.inscription')->with($data);
    }

    public function infoUser($id){
        $infoUser = User::where('id',$id)->first();
        return $infoUser;

    }

    public function ficheExiste($id){
        $ficheExiste = Fiche::where('id_user','=',$id)->first();
        return $ficheExiste;
    }

    public function galerieExiste($id){
        $galerieExiste = Galerie::where('id_user','=',$id)->get();
        return $galerieExiste;
    }

    public function home($id){
        
        $infoUser = $this->infoUser($id);
        $ficheExiste = $this->ficheExiste($id);
        $galerieExiste = $this->galerieExiste($id);

        //dd($galerieExiste);

        
        return view('prestataire.home',compact('ficheExiste','galerieExiste','infoUser'));
    }

    public function getFiche($id){
        
        $listPrestation = Prestation::get();
        $listEstimation = Estimation::get();
        $infoUser = $this->infoUser($id);
        $ficheExiste = $this->ficheExiste($id);

        return view('prestataire.fiche_prestataire',compact('listEstimation','infoUser','ficheExiste','listPrestation'));
    }

    public function postFiche(Request $request){
        //dd($request->all());
        try {
            //$this->validate($request,$this->rules,$this->message);

            $image = $request->file('image_five');
            $image_five = $input['image_fivename'] = time(). '.' . $image->getClientOriginalname();
            $destination = public_path('/image');
            $image->move($destination, $input['image_fivename']);
    
            $fiche = New Fiche;

            $fiche->name = $request->get('name');
            $fiche->localisation = $request->get('localisation');
            $fiche->id_prestations = $request->get('id_prestations');
            $fiche->description = $request->get('description');
            $fiche->presentation = $request->get('presentation');
            $fiche->path_img = $image_five;
            $fiche->phone_service = $request->get('phone_service');
            $fiche->phone2_service = $request->get('phone2_service');
            $fiche->phone_whastapp = $request->get('phone_whastapp');
            $fiche->lien_facebook = $request->get('lien_facebook');
            $fiche->lien_instagram = $request->get('lien_instagram');
            $fiche->email_service = $request->get('email_service');
            $fiche->estimation_max = $request->get('estimation_max');
            $fiche->estimation_min = $request->get('estimation_min');
            $fiche->id_user = $request->get('id_user');
            $fiche->statu_fiche = 0;
            $fiche->messagerie = 0;
            $fiche->position = 0;
            $fiche->favoris = 0;
            
            // save du menu nourriture ---- #########
            $fiche->save();
            return redirect()->back()->with('success', 'Opération éffectué avec succès.');

        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.'.$th);
        }
    }

    public function fiche($id){

        $ficheExiste = $this->ficheExiste($id);
        $infoUser = $this->infoUser($id);
        $galerieExiste = $this->galerieExiste($id);
        //dd(!empty($galerieExiste));

        return view('prestataire.detail_fiche',compact('infoUser','ficheExiste','galerieExiste'));
    }

    public function updateFiche(Request $request){

        //dd($request->all());
        try {
            //$this->validate($request,$this->rules,$this->message);

            $name = $request->get('name');
            $localisation = $request->get('localisation');
            $description = $request->get('description');
            $montant_min_prest = $request->get('montant_min_prest');
            $montant_max_prest = $request->get('montant_max_prest');
            $phone_service = $request->get('phone_service');
            $phone2_service = $request->get('phone2_service');
            $phone_whastapp = $request->get('phone_whastapp');
            $lien_facebook = $request->get('lien_facebook');
            $email_service = $request->get('email_service');

            $id = $request->get('id');

            Fiche::where('id',$id)
            ->update([
                'name' => $name,
                'localisation' => $localisation,
                'description' => $description,
                'montant_min_prest' => $montant_min_prest,
                'montant_max_prest' => $montant_max_prest,
                'phone_service' => $phone_service,
                'phone2_service' => $phone2_service,
                'phone_whastapp' => $phone_whastapp,
                'lien_facebook' => $lien_facebook,
                'email_service' => $email_service,
            ]);


            return redirect()->back()->with('success', 'Opération éffectué avec succès.');

        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.'.$th);
        }

    }

    public function saveGalerie(Request $request){

        //dd($request->all());

        $user = Auth::user();
        try {
            $input = $request->all();
            $id = $request->get('id_user');
            $images = array();
            if($files=$request->file('images')){
                foreach($files as $file){
                    // $lien = 
                    $name = $file->getClientOriginalName();
                    $file->move('image',$name);
                    $images[]=$name;
                    

                    Galerie::create([
                        'path' => $name,
                        'id_user' => $id,
                    ]);
                }
            }
            /*Insert your data*/

            //$user = User::find($id)
            //$user->name = $request->name;
            //$user->email = $request->email;
            //$user->update();

            

            return redirect()->back()->with('success', 'Opération éffectué avec succès.');

        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.'.$th);
        }
    }


    public function getReservation($id){

        $ficheExiste = $this->ficheExiste($id);
        $infoUser = $this->infoUser($id);
        $galerieExiste = $this->galerieExiste($id);

        return view('prestataire.list_reservation', compact('infoUser'));
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

        return view('prestataire.fiche_prestataire',compact('prestataire','galerie'));
    }

    public function getMessagerie(){
        
    }
}
