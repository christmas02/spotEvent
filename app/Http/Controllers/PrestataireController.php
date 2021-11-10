<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Fiche;
use App\Galerie;
use App\Prestation;
use App\Estimation;
use App\Demande;
use App\Clicfiche;
use App\Clicphone;
use Illuminate\Support\Facades\Response;
use App\Conversation;
use App\Message;
use App\Commune;
use App\Video;


class PrestataireController extends Controller
{
    //

    public function inscriptionPrestataire()
    {
       $data=[];
       return view('template.inscription')->with($data);
    }

    public function visiteFiche($id){
        $visite = Clicfiche::where('id_prestataire',$id)->get();
        return count($visite);
    }

    public function visiteFicheMonth($id){
        $month = date('m');
        $visiteMonth = Clicfiche::where('id_prestataire',$id)
        ->whereMonth('created_at', $month)
        ->get();
        return count($visiteMonth);
    }

    public function visitePhone($id){

        $phone = Clicphone::where('id_prestataire',$id)->get();
        return count($phone);
    }

    public function visitePhoneMonth($id){
        $month = date('m');
        $phoneMonth = Clicphone::where('id_prestataire',$id)
        ->whereMonth('created_at', $month)
        ->get();
        return count($phoneMonth);
    }

    public function demande($id){

        $demande = Demande::where('id_prestataire',$id)->get();
        return count($demande);
    }

    public function demandeMonth($id){
        $month = date('m');
        $demandeMonth = Demande::where('id_prestataire',$id)
        ->whereMonth('created_at', $month)
        ->get();
        return count($demandeMonth);
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

    public function videoExiste($id){
        $videoExiste = Video::where('id_user','=',$id)->first();
        return $videoExiste;
    }

    public function getDemande($id)
    {
        $listDemande = Demande::where('id_prestataire',$id)->orderBy('id', 'desc')->get();
        return $listDemande;

    }

    public function home($id){
        
        $infoUser = $this->infoUser($id);
        $ficheExiste = $this->ficheExiste($id);
        $galerieExiste = $this->galerieExiste($id);
        $visite = $this->visiteFiche($id);
        $phone = $this->visitePhone($id);
        $demande = $this->demande($id);
        $listDemande = $this->getDemande($id);
        $visiteMonth = $this->visiteFicheMonth($id);
        $phoneMonth = $this->visitePhoneMonth($id);
        $demandeMonth = $this->demandeMonth($id);

        //dd($galerieExiste);

        
        return view('prestataire.home',compact('ficheExiste','galerieExiste','infoUser','visite','phone',
        'demande','listDemande','visiteMonth','phoneMonth','demandeMonth'));
    }

    public function getFiche($id){
        
        $listPrestation = Prestation::get();
        $listEstimation = Estimation::get();
        $listCommune = Commune::get();
        $infoUser = $this->infoUser($id);
        $ficheExiste = $this->ficheExiste($id);

        return view('prestataire.fiche_prestataire',compact('listEstimation','listCommune','infoUser','ficheExiste','listPrestation'));
    }

    public function postFiche(Request $request){

        //dd($request->all());
        try {

            $id_user =  $request->get('id_user');

            $ficheExist = Fiche::where('id_user',$id_user)->first();

            if($ficheExist){
                return redirect()->back()->with('danger', 'Vous possédez déjà une fiche prestataire.');
            }
            

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'localisation' => 'required',
                'id_prestations' => 'required',
                'description' => ['required'],
                'presentation' => ['required', 'string', 'max:400'],
                'detail_localisation' => 'required',
                'phone_service' => ['max:10'],
                'phone2_service' => ['max:10'],
                'phone_whastapp' => ['max:10'],
                'lien_facebook' => ['max:100'],
                'lien_instagram' => ['max:100'],
                'email_service' => ['max:50'],
              
            ]);
     
            if ($validator->fails()) {
                //dd($validator);
                return back()->withErrors($validator)->withInput();
            }

            /*$image = $request->file('image_five');
            $image_five = $input['image_fivename'] = time(). '.' . $image->getClientOriginalname();
            $destination = public_path('/image');
            $image->move($destination, $input['image_fivename']);*/
            $file = $request->file('image_five');
            $name_img = $file->getClientOriginalName();
            $storage_data = Storage::disk('public')->put($name_img, file_get_contents($file));
            
    
            $fiche = New Fiche;

            $fiche->name = $request->get('name');
            $fiche->localisation = $request->get('localisation');
            $fiche->id_prestations = $request->get('id_prestations');
            $fiche->description = $request->get('description');
            $fiche->presentation = $request->get('presentation');
            $fiche->detail_localisation = $request->get('detail_localisation');
            $fiche->path_img = $name_img; 
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
            $fiche->actif_phone = 0;
            $fiche->actif_whatsapp = 0;
            $fiche->actif_chat = 0;
            $fiche->messagerie = 0;
            $fiche->position = 0;
            $fiche->favoris = 0;
            $fiche->nbre_image = 3;
            
            // save du menu nourriture ---- #########
            $fiche->save();
            return redirect()->back()->with('success', 'Opération éffectué avec succès.');

        } catch (\Throwable $e) {
            dd($e);
            return redirect()->back()->with('danger', 'Echec de l\'enregistrement');
        }

    }

    public function fiche($id){

        $ficheExiste = $this->ficheExiste($id);
        $infoUser = $this->infoUser($id);
        $galerieExiste = $this->galerieExiste($id);
        $videoExiste = $this->videoExiste($id);
        $listEstimation = Estimation::get();
        $listPrestation = Prestation::get();

        $video = Video::where('id_user',$id)->first();
        //dd(!empty($videoExiste));
        //dd($videoExiste);
        

        return view('prestataire.detail_fiche',compact('infoUser','ficheExiste','galerieExiste', 'listPrestation','listEstimation','video','videoExiste'));
    }

    public function updateFiche(Request $request){
        //dd($request->all());
        try {

            $name = $request->get('name');
            $localisation = $request->get('localisation');
            $presentation = $request->get('presentation');
            $description = $request->get('description');
            $detail_localisation = $request->get('detail_localisation');
            $id_prestations = $request->get('id_prestations');

            // $estimation_min = $request->get('estimation_min');
            // $estimation_max = $request->get('estimation_max');
            $phone_service = $request->get('phone_service');
            $phone2_service = $request->get('phone2_service');
            $phone_whastapp = $request->get('phone_whastapp');
            $lien_facebook = $request->get('lien_facebook');
            $lien_instagram = $request->get('lien_instagram');
            $email_service = $request->get('email_service');

            $id = $request->get('id');

            Fiche::where('id',$id)
            ->update([
                'name' => $name,
                'localisation' => $localisation,
                'description' => $description,
                'presentation' => $presentation,
                'id_prestations' => $id_prestations,
                'detail_localisation' => $detail_localisation,
                //'estimation_min' => $estimation_min,
                //'estimation_max' => $estimation_max,
                'phone_service' => $phone_service,
                'phone2_service' => $phone2_service,
                'phone_whastapp' => $phone_whastapp,
                'lien_facebook' => $lien_facebook,
                'lien_instagram' => $lien_instagram,
                'email_service' => $email_service,
            ]);


            return redirect()->back()->with('success', 'Opération éffectué avec succès.');

        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error de mise jour !');
        }

    }

    public function saveGalerie(Request $request){
        //dd($request->all());
        $user = Auth::user();
        try {
            $input = $request->all();
            $id = $request->get('id_user');

            $infosPrestataire = Fiche::where('id_user',$id)->first();
            $cotaImage = $infosPrestataire->nbre_image;

            $images = array();
            if($files=$request->file('images')){

                if(count($files) <= $cotaImage){
                    //
                    foreach($files as $file){
                        //
                        $name = $file->getClientOriginalName();
                        //$name = time() . '.' . $file->getClientOriginalExtension();
                        //$file->move('image',$name);
                        $storage_data = Storage::disk('public')->put($name, file_get_contents($file));
                        $images[]=$name;
                        //
                        //$extension = $file->getClientOriginalExtension();
                        //$image_two = time(). '.' . $image->getClientOriginalname();
                        //$filename = time() . '.' . $file->getClientOriginalExtension();
                        //$storage_data = Storage::disk('public')->put($filename, file_get_contents($file));
                        //$file_path = Storage::url($filename);
                        //$new_path = asset($file_path);
                        //$images[]=$filename;
                      
                        Galerie::create([
                            'path' => $name,
                            'id_user' => $id,
                        ]);
                    }

                }else{
                    $cotaValide = count($files) - 1 ;
                    return redirect()->back()->with('danger', "Enregistrement impossible vous disposer d'un cota de ".$cotaImage);
                }

            }
            
            return redirect()->back()->with('success', 'Opération éffectué avec succès.');

        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Erreur , vous ne possédez pas de fiche prestataire.');
        }
    }


    public function getReservation($id){

        $ficheExiste = $this->ficheExiste($id);
        $infoUser = $this->infoUser($id);
        $galerieExiste = $this->galerieExiste($id);
        $listDemande = $this->getDemande($id);

        return view('prestataire.list_reservation', compact('infoUser','listDemande'));
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

    public function getMessagerie($id){

        $infoUser = $this->infoUser($id);
        $conversation = Conversation::where('conversations.id_recepteur',$id)
        ->leftjoin('users','users.id','=','conversations.id_user')
        ->leftjoin('messages','messages.conversation','=','conversations.cod_conversation')
        ->select('users.*','messages.id as id_message','messages.conversation as code','messages.contenus as message')
        ->orderBy('messages.id', 'desc')
        //->groupBy('messages.conversation')
        //->distinct('messages.conversation')
        ->distinct()
        //->count('messages.conversation')
        ->get();
        //dd($conversation);
        //->get(['messages.conversation']);
        return view('prestataire.messages',compact('infoUser','conversation'));
        
    }

    public function saveMessage(Request $request){
        try{

            //dd($request->all());

            $id_emmetteur = $request->id_emmetteur;
            $contenus = $request->contenus;
            $conversation = $request->conversation;

            $id_recepteur = $request->id_recepteur;

            if($conversation > 0){

                $message = new Message;

                $message->id_emmetteur = $id_emmetteur;
                $message->contenus = $contenus;
                $message->conversation = $conversation;

                $message->save();

            }else{
                //dd($request->all());

                $conversatiom_exsite = Conversation::where('id_user', $id_recepteur)
                ->where('id_recepteur',$id_emmetteur)->first();


                if($conversatiom_exsite){
                    //dd($conversatiom_exsite->cod_conversation);
                    $message = new Message;

                    $message->id_emmetteur = $id_emmetteur;
                    $message->contenus = $contenus;
                    $message->conversation = $conversatiom_exsite->cod_conversation;

                    $message->save();

                }else{
                    // Creation de la conversation
                    $code = time();
                    $conversation = new Conversation;

                    $conversation->id_user = $request->id_emmetteur;
                    $conversation->id_recepteur = $id_recepteur;
                    $conversation->cod_conversation = $code;

                    $conversation->save();

                    // Enregistrement du messages dans la table messages

                    $message = new Message;

                    $message->id_emmetteur = $id_emmetteur;
                    $message->contenus = $contenus;
                    $message->conversation = $code;

                    $message->save();

                }
                

            }
            return redirect()->back()->with('success', 'Opération éffectué avec succès.');

        }catch(\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.');
        }

    }

    public function editImage($id)
    {
        //
        $where = array('id' => $id);
        $post  = User::where($where)->first();
 
        return Response::json($post);
    }

    public function updateImage(Request $request){
        try {
            $id = $request->get('id');
            $table = $request->get('table');

            $file = $request->file('image');
            $name_img = $file->getClientOriginalName();
            $storage_data = Storage::disk('public')->put($name_img, file_get_contents($file));

            if($table == 1){

                Fiche::where('id',$id)
                ->update([
                    'path_img' => $name_img,
                ]);

            }else{

                Galerie::where('id',$id)
                ->update([
                    'path' => $name_img,
                ]);

            }

            return redirect()->back()->with('success', "Opération éffectué avec succès.");

        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.');
        }


    }

    public function deletImage(Request $request){
        try {
            $id = $request->get('id');

            $image = Galerie::find($id);
            $image->delete();

            return redirect()->back()->with('success', "Opération éffectué avec succès.");

        } catch (\Throwable $th) {
           //dd($th);
            return redirect()->back()->with('danger', 'Error.');
        } 

    }

    public function addGaleri(Request $request){
        //dd($request->file('images'));
        $id_user = $request->get('id_user');
        $imgPossible = $request->get('imgPossible');
        $images = array();
            if ($files=$request->file('images')) {
                if (count($files) <= $imgPossible) {
                    //
                    foreach ($files as $file) {
                        //
                        $name = time() . '.' . $file->getClientOriginalName();
                        //$name = time() . '.' . $file->getClientOriginalExtension();
                        //$file->move('image',$name);
                        $storage_data = Storage::disk('public')->put($name, file_get_contents($file));
                        $images[]=$name;
                        //
                        //$extension = $file->getClientOriginalExtension();
                        //$image_two = time(). '.' . $image->getClientOriginalname();
                        //$filename = time() . '.' . $file->getClientOriginalExtension();
                        //$storage_data = Storage::disk('public')->put($filename, file_get_contents($file));
                        //$file_path = Storage::url($filename);
                        //$new_path = asset($file_path);
                        //$images[]=$filename;
                      
                        Galerie::create([
                            'path' => $name,
                            'id_user' => $id_user
                        ]);
                    }
                } else {
                    
                    return redirect()->back()->with('danger', "Enregistrement impossible, vous pouvez enregistrez que  ".$imgPossible);
                }

                return redirect()->back()->with('success', "Opération éffectué avec succès.");
            }


    }

    public function addVideo(Request $request){

        try {
            //dd($request->all());

            $id_user = $request->get('id_user');

            $validator = Validator::make($request->all(), [
                'video' => 'required|file|mimetypes:video/mp4',
              
            ]);
     
            if ($validator->fails()) {
                //dd($validator);
                return back()->withErrors($validator)->withInput();
            }

            

            $file = $request->file('video');
            $name_video = $file->getClientOriginalName();
            $storage_data = Storage::disk('public')->put($name_video, file_get_contents($file));

            $video = new Video;

            $video->id_user = $id_user;
            $video->path = $name_video;

            $video->save();

            return redirect()->back()->with('success', "Opération éffectué avec succès.");

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('danger', 'Echec de l;enregistrement.');
        }

    }


}
