<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Prestation;
use App\Fiche;
use App\User;
use App\Galerie;
use App\Demande;
use App\Clicfiche;
use App\Clicphone;
use App\Conversation;
use App\Message;
use Illuminate\Mail\Message as MailMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    //
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

    public function getDemande($id)
    {
        $listDemande = Demande::where('id_prestataire',$id)->orderBy('id', 'desc')->get();
        return $listDemande;

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

        //dd($user);
        $infoUser = $this->Userinfo($user);
        $prestataire = DB::table('fiches')
                        ->where('fiches.id',$id)
                        ->leftjoin('users','users.id','=','fiches.id_user')
                        //->leftjoin('galeries','galeries.id_user','fiches.id_user')
                        ->select('users.name as nom','users.email as adresse','users.id as id_user','users.phone as numero','fiches.*')
                        ->first();

                        $visite = $this->visiteFiche($prestataire->id_user);
                        $phone = $this->visitePhone($prestataire->id_user);
                        $demande = $this->demande($prestataire->id_user);
                        $listDemande = $this->getDemande($prestataire->id_user);
                        $visiteMonth = $this->visiteFicheMonth($prestataire->id_user);
                        $phoneMonth = $this->visitePhoneMonth($prestataire->id_user);
                        $demandeMonth = $this->demandeMonth($prestataire->id_user);

        $galerie = $this->galerie($prestataire->id_user);
        //dd($prestataire->id_user);

        return view('admin.fiche_prestataire',compact('prestataire','galerie','infoUser',
        'visite','phone','demande','listDemande','visiteMonth','phoneMonth','demandeMonth'));
    }

    public function statiatique($id){

        $allvisite = Clicfiche::all();
        $allphone = Clicphone::all();
        $allDemande = Demande::all();

        $visite = count($allvisite);
        $phone = count($allphone);
        $demande = count($allDemande);
        
        $infoUser = $this->Userinfo($id);
        return view('admin.statiatique',compact('infoUser','visite','phone','demande'));
    }

    public function getAlldemande($id){
        $infoUser = $this->Userinfo($id);
        $allDemande = Demande::leftjoin('fiches','fiches.id_user','=','demandes.id_prestataire')
        ->leftjoin('users','users.id','=','fiches.id_user')
        ->select('demandes.*','fiches.name as prestation','users.name as prestataire')
        ->get();
        return view('admin.list_demande',compact('allDemande','infoUser'));
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
            $telephone = $request->get('telephone');
            $whatsapp = $request->get('whatsapp');
            $cotaimage = $request->get('cotaimage');
            

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

            //if($favoris AND $favoris != $firstFiche->favoris){
                Fiche::where('id',$id_fiche)->update(['actif_phone' => $telephone]);
            //}

            //if($favoris AND $favoris != $firstFiche->favoris){
                Fiche::where('id',$id_fiche)->update(['actif_whatsapp' => $whatsapp]);
            //}

            Fiche::where('id',$id_fiche)->update(['nbre_image' => $cotaimage]);

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

    ////// MESSAGERIE ///////////

    public function saveMessage(Request $request){
        try{

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

                $conversatiom_exsite = Conversation::where('id_user', $id_emmetteur)
                ->where('id_recepteur',$id_recepteur)->first();

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
            return redirect()->back()->with('danger', 'Error.'.$th);
        }

    }


    

    public function message($id){
        $infoUser = $this->Userinfo($id);
        $conversation = Conversation::where('conversations.id_user',$id)
        ->leftjoin('users','users.id','=','conversations.id_recepteur')
        ->leftjoin('messages','messages.conversation','=','conversations.cod_conversation')
        ->select('users.*','messages.id as id_message','messages.contenus','messages.conversation as code')
        ->orderBy('messages.id', 'desc')
        //->groupBy('messages.conversation')
        //->distinct('messages.conversation')
        ->distinct()
        //->count('messages.conversation')
        ->get();
        //dd($conversation);
        //->get(['messages.conversation']);
        return view('admin.messages',compact('infoUser','conversation'));
    }

    public function getmessage($code)
    {
        //
        //dd($code)
        $data = Message::where('conversation','=',$code)->get();
        //dd($data);
        return response()->json($data);
    }
}
