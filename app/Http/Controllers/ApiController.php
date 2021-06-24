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
use App\Conversation;
use App\Message;


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

        $listeFavoris = Favori::where('favoris.id_user', $id_user)
                    ->leftjoin('fiches','fiches.id_user','=','favoris.id_prestataire')
                    ->select('favoris.*','fiches.path_img','fiches.presentation','fiches.name')
                    ->get();

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
            return response()->json(['statu'=>0,'message' => $message, 'resultat' => $resultat]);
        }else{
            $message = "resultat vide";
            return response()->json(['statu'=>1, 'message' => $message,'resultat' => $resultat]);
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

    public function getConversation(Request $request){

        try{
            $id_user = $request['id_user'];

            $conversation = Conversation::where('conversations.id_user',$id_user)
                ->leftjoin('users','users.id','=','conversations.id_recepteur')
                ->leftjoin('messages','messages.conversation','=','conversations.cod_conversation')
                ->select('users.id as id_recepteur','users.name as name_recepteur','users.path_user as image_recepteur','messages.id as id_message','messages.conversation as conversation')
                ->orderBy('messages.id', 'desc')
                ->distinct()
                ->get();

            //dd($conversation);

            if(count($conversation) != '0'){
                $message = "Conversation disponible";
                return response()->json(['statu'=>0,'message' => $message, 'conversation' => $conversation]);
            }else{
                $message = "Aucune conversation disponible";
                return response()->json(['statu'=> 1,'message' => $message, 'conversation' => $conversation]);
            }



        }catch(\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.'.$th);
        }

    }

    public function getMessage(Request $request){

        try{
            $conversation = $request['conversation'];

            $messages = Message::where('conversation','=',$conversation)->get();

            //dd($conversation);

            if(count($messages) != '0'){
                $message = "message disponible";
                return response()->json(['statu'=>1,'message' => $message, 'messages' => $messages]);
            }else{
                $message = "Aucun message disponible";
                return response()->json(['statu'=> 0,'message' => $message, 'messages' => $messages]);
            }



        }catch(\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.'.$th);
        }

    }

    public function saveMessage(Request $request){

        try{

            $id_emmetteur = $request['id_emmetteur'];
            $contenus = $request['contenus'];
            $conversation = $request['conversation'];
            $id_recepteur = $request['id_recepteur'];

            
            if($conversation > 0){

                $message = new Message;

                $message->id_emmetteur = $id_emmetteur;
                $message->contenus = $contenus;
                $message->conversation = $conversation;

                $message->save();

                if($message){
                    $resultat = "message enregistre";
                    return response()->json(['statu'=>1,'message' => $resultat]);

                }else{
                    $resultat = "message echec";
                    return response()->json(['statu'=>0,'message' => $resultat]);
                }

            }else{

                    $conversatiom_exsite = Conversation::where('id_user', $id_emmetteur)
                    ->where('id_recepteur',$id_recepteur)->first();

                    if($conversatiom_exsite){

                        $message = new Message;

                        $message->id_emmetteur = $id_emmetteur;
                        $message->contenus = $contenus;
                        $message->conversation = $conversatiom_exsite->cod_conversation;

                        $message->save();

                        if($message){
                            $resultat = "message enregistre";
                            return response()->json(['statu'=>1,'message' => $resultat]);
        
                        }else{
                            $resultat = "message echec";
                            return response()->json(['statu'=>0,'message' => $resultat]);
                        }

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

                        if($message AND $conversation){
                            $resultat = "message et conversation enregistre";
                            $convertions = $code;
                            return response()->json(['statu'=>1,'message' => $resultat,'conversation'=> $convertions ]);

                        }else{
                            $resultat = "message et conversation echec";
                            return response()->json(['statu'=0,'message' => $resultat]);
                        }

                }
                
            }



        }catch(\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.'.$th);
        }

    }


    public function saveImage(Request $request){

        $id_user = $request['estmation_max'];
       

    }

    public function updateProfile(Request $request){

        $id_user = $request['id_user'];
        $name = $request['name'];
        $email = $request['email'];
        $phone = $request['phone'];

        
    }

    public function newPassword(Request $request){
        
    }



}
