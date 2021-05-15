<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Fiche;
use App\Galerie;
use App\Prestation;


class PrestataireController extends Controller
{
    //

    public function inscriptionPrestataire()
    {
       $data=[];

       return view('template.inscription')->with($data);
    }

    public function ficheExiste($id){
        $ficheExiste = Fiche::where('id_user','=',$id)->first();
        return $ficheExiste;
    }

    public function galerieExiste($id){
        $galerieExiste = Galerie::where('id_user','=',$id)->first();
        return $galerieExiste;
    }

    public function home(){
        $user = Auth::user();
        $ficheExiste = $this->ficheExiste($user->id);
        $galerieExiste = $this->galerieExiste($user->id);

        //dd($galerieExiste);

        
        return view('prestataire.home',compact('ficheExiste','galerieExiste'));
    }

    public function getFiche(){
        $user = Auth::user();
        $listPrestation = Prestation::get();
        $ficheExiste = $this->ficheExiste($user->id);

        return view('prestataire.fiche_prestataire',compact('ficheExiste','listPrestation'));
    }

    public function postFiche(Request $request){
        //dd($request->all());
        try {
            $user = Auth::user();
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
            $fiche->path_img = $image_five;
            $fiche->phone_service = $request->get('phone_service');
            $fiche->phone2_service = $request->get('phone2_service');
            $fiche->phone_whastapp = $request->get('phone_whastapp');
            $fiche->lien_facebook = $request->get('lien_facebook');
            $fiche->lien_instagram = $request->get('lien_instagram');
            $fiche->email_service = $request->get('email_service');
            $fiche->montant_max_prest = $request->get('montant_max_prest');
            $fiche->montant_min_prest = $request->get('montant_min_prest');
            $fiche->id_user = $user->id;
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

    public function fiche(){

        $user = Auth::user();

        $ficheExiste = $this->ficheExiste($user->id);
        $galerieExiste = $this->galerieExiste($user->id);


        //dd($ficheExiste);

        return view('prestataire.detail_fiche',compact('ficheExiste','galerieExiste'));
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
            $images = array();
            if($files=$request->file('images')){
                foreach($files as $file){
                    $name = $file->getClientOriginalName();
                    $file->move('image',$name);
                    $images[]=$name;

                    Galerie::create([
                        'path' => $name,
                        'id_user' => $user->id,
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


    public function getReservation(){

    }

    public function getMessagerie(){
        
    }
}
