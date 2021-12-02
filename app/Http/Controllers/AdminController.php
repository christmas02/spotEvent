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
use App\Commentaire;
use App\Conversation;
use App\Estimation;
use App\Message;
use Illuminate\Mail\Message as MailMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Contenu;
use App\Folder;
use App\Publicite;
use App\Smsrapport;


class AdminController extends Controller
{
    //
    public function visiteFiche($id)
    {
        $visite = Clicfiche::where('id_prestataire', $id)->get();
        return count($visite);
    }

    public function visiteFicheMonth($id)
    {
        $month = date('m');
        $visiteMonth = Clicfiche::where('id_prestataire', $id)
            ->whereMonth('created_at', $month)
            ->get();
        return count($visiteMonth);
    }

    public function visitePhone($id)
    {

        $phone = Clicphone::where('id_prestataire', $id)->get();
        return count($phone);
    }

    public function visitePhoneMonth($id)
    {
        $month = date('m');
        $phoneMonth = Clicphone::where('id_prestataire', $id)
            ->whereMonth('created_at', $month)
            ->get();
        return count($phoneMonth);
    }



    public function getDemande($id)
    {
        $listDemande = Demande::where('id_prestataire', $id)->orderBy('id', 'desc')->get();
        return $listDemande;
    }

    public function demande($id)
    {

        $demande = Demande::where('id_prestataire', $id)->get();
        return count($demande);
    }

    public function smsrecu($id){
        $smsrecus = Smsrapport::where('id_prestataire',$id)->get();
        return $smsrecus;
    }

    public function categorie($id)
    {

        $categories = Prestation::get();
        $infoUser = $this->Userinfo($id);
        //return count($demande);
        return view('admin.list_categorie', compact('categories', 'infoUser'));
    }

    public function estimation($id)
    {

        $categories = Estimation::get();
        $infoUser = $this->Userinfo($id);
        //return count($demande);
        return view('admin.list_estimation', compact('categories', 'infoUser'));
    }

    public function demandeMonth($id)
    {
        $month = date('m');
        $demandeMonth = Demande::where('id_prestataire', $id)
            ->whereMonth('created_at', $month)
            ->get();
        return count($demandeMonth);
    }

    public function prestataire()
    {
        $listePrestation = Fiche::all();
        return $listePrestation;
    }

    public function prestations()
    {
        $listePrestation = Prestation::all();
        return $listePrestation;
    }


    public function login()
    {
        //$listePrestation = Prestation::get();
        return view('admin.login');
    }

    public function Userinfo($id)
    {
        $infoUser = User::where('id', $id)->first();
        return  $infoUser;
    }

    public function home($id)
    {

        //dd();
        $infoUser = User::where('id', $id)->first();
        //dd($infoUser->name);
        $Users = User::all();
        return view('admin.home', compact('Users', 'infoUser'));
    }

    public function listeprestatire($id)
    {

        //dd();
        $infoUser = User::where('id', $id)->first();
        //dd($infoUser->name);
        $Prestataire = User::where('role', 2)->get();
        //dd($Prestataire);
        return view('admin.prestataire', compact('Prestataire', 'infoUser'));
    }

    public function listeutilisateur($id)
    {

        //dd();
        $infoUser = User::where('id', $id)->first();
        //dd($infoUser->name);
        $Utilisateur = User::where('role', 1)->get();
        //dd($Prestataire);
        return view('admin.utilisateur', compact('Utilisateur', 'infoUser'));
    }

    public function listficheactif($id)
    {

        //dd();
        $infoUser = User::where('id', $id)->first();
        //dd($infoUser->name);
        $Utilisateur = User::where('role', 1)->get();
        //dd($Prestataire);

        $listePrestation = Db::table('fiches')->where('statu_fiche', 1)
            ->leftjoin('users', 'users.id', '=', 'fiches.id_user')
            ->leftjoin('communes', 'communes.id', '=', 'fiches.localisation')
            ->select('users.name as nom', 'communes.name as commune', 'users.phone as numero', 'fiches.*')
            ->orderBy('fiches.id', 'desc')
            ->get();

        return view('admin.list_fiche_actif', compact('Utilisateur', 'listePrestation', 'infoUser'));
    }

    public function listfichenonactif($id)
    {

        //dd();
        $infoUser = User::where('id', $id)->first();
        //dd($infoUser->name);
        $Utilisateur = User::where('role', 1)->get();
        //dd($Prestataire);

        $listePrestation = Db::table('fiches')->where('statu_fiche', 0)
            ->leftjoin('users', 'users.id', '=', 'fiches.id_user')
            ->leftjoin('communes', 'communes.id', '=', 'fiches.localisation')
            ->select('users.name as nom', 'communes.name as commune', 'users.phone as numero', 'fiches.*')
            ->orderBy('fiches.id', 'desc')
            ->get();
        return view('admin.list_fiche_actif', compact('Utilisateur', 'listePrestation', 'infoUser'));
    }

    public function getPrestatire($id)
    {

        $infoUser = $this->Userinfo($id);

        $listePrestation = Db::table('fiches')
            ->leftjoin('users', 'users.id', '=', 'fiches.id_user')
            ->leftjoin('communes', 'communes.id', '=', 'fiches.localisation')
            ->select('users.name as nom', 'communes.name as commune', 'users.phone as numero', 'fiches.*')
            ->orderBy('fiches.id', 'desc')
            ->get();

        //dd($listePrestation);

        return view('admin.list_prestataire', compact('listePrestation', 'infoUser'));
    }

    public function galerie($id)
    {
        $galerie = Galerie::where('id_user', '=', $id)->get();
        return $galerie;
    }

    public function onePrestatire($id, $user)
    {

        //dd($user);
        $infoUser = $this->Userinfo($user);
        $prestataire = DB::table('fiches')
            ->where('fiches.id', $id)
            ->leftjoin('users', 'users.id', '=', 'fiches.id_user')
            //->leftjoin('galeries','galeries.id_user','fiches.id_user')
            ->select('users.name as nom', 'users.email as adresse', 'users.id as id_user', 'users.phone as numero', 'fiches.*')
            ->first();

        $visite = $this->visiteFiche($prestataire->id_user);
        $phone = $this->visitePhone($prestataire->id_user);
        $demande = $this->demande($prestataire->id_user);
        $listDemande = $this->getDemande($prestataire->id_user);
        $visiteMonth = $this->visiteFicheMonth($prestataire->id_user);
        $phoneMonth = $this->visitePhoneMonth($prestataire->id_user);
        $demandeMonth = $this->demandeMonth($prestataire->id_user);
        $smsrecus = $this->smsrecu($prestataire->id_user);

        $galerie = $this->galerie($prestataire->id_user);

        $commentaire = Commentaire::where('commentaires.id_prestataire', $id)
            ->leftjoin('users', 'users.id', '=', 'commentaires.id_user')
            ->leftjoin('fiches', 'fiches.id', '=', 'commentaires.id_prestataire')
            ->select('fiches.name as prestataire', 'users.name as utilisateur', 'commentaires.contenus', 'commentaires.vote')
            ->get();

        $document = Folder::where('id_prestataire',$prestataire->id_user)->get();
        //dd($document);

        return view('admin.fiche_prestataire', compact(
            'prestataire',
            'galerie',
            'infoUser',
            'visite',
            'phone',
            'demande',
            'listDemande',
            'visiteMonth',
            'phoneMonth',
            'demandeMonth',
            'commentaire',
            'smsrecus',
            'document'
        ));
    }

    public function statiatique($id)
    {

        //$allvisite = Clicfiche::all();

        $allvisite = Clicfiche::leftjoin('users','users.id','=','clicfiches.id_prestataire')
        //->leftjoin('user','id.users','=','id_user.clifiches')
        ->select('users.name as name_prestataire','clicfiches.*')
        ->get();

        //dd($allvisite);

        $allphone = Clicphone::all();
        $allDemande = Demande::all();

        $visite = count($allvisite);
        $phone = count($allphone);
        $demande = count($allDemande);

        $infoUser = $this->Userinfo($id);
        return view('admin.statiatique',compact('allvisite','infoUser','visite','phone','demande'));
    }

    public function visitePrestataire($prestataire, $id){

        $allvisite = Clicfiche::where('id_prestataire',$prestataire)
        ->leftjoin('users','users.id','=','clicfiches.id_prestataire')
        //->leftjoin('user','id.users','=','id_user.clifiches')
        ->select('users.name as name_prestataire','clicfiches.*')
        ->get();

        //dd($prestataire);

        $allphone = Clicphone::all();
        $allDemande = Demande::all();

        $visite = count($allvisite);
        $phone = count($allphone);
        $demande = count($allDemande);

        $infoUser = $this->Userinfo($id);
        return view('admin.visite',compact('allvisite','infoUser','visite','phone','demande'));

    }

    public function contactPrestataire($prestataire, $id){

        //dd($allvisite);

        $allvisite = Clicphone::where('id_prestataire',$prestataire)
        ->leftjoin('users','users.id','=','clicphones.id_prestataire')
        //->leftjoin('user','id.users','=','id_user.clifiches')
        ->select('users.name as name_prestataire','clicphones.*')
        ->get();

        //dd($prestataire);


        $infoUser = $this->Userinfo($id);
        return view('admin.visite',compact('infoUser','allvisite'));

    }

    public function statistiqueContact($id)
    {

        //dd($allvisite);
        $allvisite = Clicfiche::all();

        
        $allphone = Clicphone::leftjoin('users','users.id','=','clicphones.id_prestataire')
        //->leftjoin('user','id.users','=','id_user.clifiches')
        ->select('users.name as name_prestataire','clicphones.*')
        ->get();

        //dd($allphone);

        $allDemande = Demande::all();

        $visite = count($allvisite);
        $phone = count($allphone);
        $demande = count($allDemande);

        $infoUser = $this->Userinfo($id);
        return view('admin.statistiqueContact',compact('allphone','allvisite','infoUser','visite','phone','demande'));
    }

    public function getAlldemande($id)
    {
        $infoUser = $this->Userinfo($id);
        $allDemande = Demande::leftjoin('fiches', 'fiches.id_user', '=', 'demandes.id_prestataire')
            ->leftjoin('users', 'users.id', '=', 'fiches.id_user')
            ->select('demandes.*', 'fiches.name as prestation', 'users.name as prestataire')
            ->get();
        return view('admin.list_demande', compact('allDemande', 'infoUser'));
    }

    public function getPrestations()
    {
        $prestations =  $this->prestations();
        return view('admin.list_prestation', compact('prestations'));
    }

    public function saveParametre(Request $request)
    {
        try {

            //dd($request->all());
            $id_fiche = $request->get('id_fiche');

            $activation = $request->get('activation');
            $position = $request->get('position');
            $messagerie = $request->get('messagerie');
            $favoris = $request->get('favoris');
            $telephone = $request->get('telephone');
            $whatsapp = $request->get('whatsapp');
            $cotaimage = $request->get('cotaimage');

            $video = $request->get('video');
            $agenda = $request->get('agenda');


            $firstFiche = Fiche::where('id', $id_fiche)->first();

            //if($activation AND $activation != $firstFiche->statu_fiche){
            Fiche::where('id', $id_fiche)->update(['statu_fiche' => $activation]);
            //}

            //if($position AND $position != $firstFiche->position){
            Fiche::where('id', $id_fiche)->update(['position' => $position]);
            //}

            //if($messagerie AND $messagerie != $firstFiche->messagerie){
            Fiche::where('id', $id_fiche)->update(['messagerie' => $messagerie]);
            //}

            //if($favoris AND $favoris != $firstFiche->favoris){
            Fiche::where('id', $id_fiche)->update(['favoris' => $favoris]);
            //}

            //if($favoris AND $favoris != $firstFiche->favoris){
            Fiche::where('id', $id_fiche)->update(['actif_phone' => $telephone]);
            //}

            //if($favoris AND $favoris != $firstFiche->favoris){
            Fiche::where('id', $id_fiche)->update(['actif_whatsapp' => $whatsapp]);
            //}

            Fiche::where('id', $id_fiche)->update(['nbre_image' => $cotaimage]);

            Fiche::where('id', $id_fiche)->update(['video' => $video]);

            Fiche::where('id', $id_fiche)->update(['agenda' => $agenda]);

            return redirect()->back()->with('success', 'Opération effectuée avec succès.');
        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.' . $th);
        }
    }

    public function savePrestation(Request $request)
    {
        try {

            //dd($request->all());
            $image = $request->file('image');
            //dd($image);
            $image_icone = $input['imagename'] = time() . '.' . $image->getClientOriginalName();
            $destination = public_path('/image');
            $image->move($destination, $input['imagename']);


            $prestation = new Prestation;

            $prestation->name = $request->get('name');
            $prestation->path_icone = $image_icone;
            $prestation->description = $request->get('description');
            $prestation->statu = 0;

            $prestation->save();
            //code...
            return redirect()->back()->with('success', 'Opération effectuée avec succès.');
        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.' . $th);
        }
    }

    ////// MESSAGERIE ///////////

    public function saveMessage(Request $request)
    {
        try {

            $id_emmetteur = $request->id_emmetteur;
            $contenus = $request->contenus;
            $conversation = $request->conversation;

            $id_recepteur = $request->id_recepteur;

            if ($conversation > 0) {

                $message = new Message;

                $message->id_emmetteur = $id_emmetteur;
                $message->contenus = $contenus;
                $message->conversation = $conversation;

                $message->save();
            } else {

                $conversatiom_exsite = Conversation::where('id_user', $id_emmetteur)
                    ->where('id_recepteur', $id_recepteur)->first();

                if ($conversatiom_exsite) {
                    //dd($conversatiom_exsite->cod_conversation);
                    $message = new Message;

                    $message->id_emmetteur = $id_emmetteur;
                    $message->contenus = $contenus;
                    $message->conversation = $conversatiom_exsite->cod_conversation;

                    $message->save();
                } else {
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
            return redirect()->back()->with('success', 'Opération effectuée avec succès.');
        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.' . $th);
        }
    }


    public function message($id)
    {
        $infoUser = $this->Userinfo($id);
        $conversation = Conversation::where('conversations.id_user', $id)
            ->leftjoin('users', 'users.id', '=', 'conversations.id_recepteur')
            ->leftjoin('messages', 'messages.conversation', '=', 'conversations.cod_conversation')
            ->select('users.*', 'messages.id as id_message', 'messages.contenus', 'messages.conversation as code')
            ->orderBy('messages.id', 'desc')
            //->groupBy('messages.conversation')
            //->distinct('messages.conversation')
            ->distinct()
            //->count('messages.conversation')
            ->get();
        //dd($conversation);
        //->get(['messages.conversation']);
        return view('admin.messages', compact('infoUser', 'conversation'));
    }

    public function newMessage($emetteur, $recepteur)
    {

        //dd($emetteur,$recepteur);
        $convesation = Conversation::where('id_user', $emetteur)->where('id_recepteur', $recepteur)->first();
        if ($convesation) {
            $data = Message::where('conversation', '=', $convesation->cod_conversation)->get();
        } else {
            $code = time();
            $conversation = new Conversation;

            $conversation->id_user = $emetteur;
            $conversation->id_recepteur = $recepteur;
            $conversation->cod_conversation = $code;

            $conversation->save();

            $data = $conversation;
        }

        return response()->json($data);
    }

    public function getmessage($code)
    {
        //
        //dd($code)
        $data = Message::where('conversation', '=', $code)->get();
        //dd($data);
        return response()->json($data);
    }

    public function updateCategorie(Request $request)
    {

        try {
            //code...
            $description = $request->get('description');
            $name = $request->get('name');
            $id = $request->get('id');

            Prestation::where('id', $id)
                ->update([
                    'name' => $name,
                    'description' => $description,
                ]);

            return redirect()->back()->with('success', 'Opération effectuée avec succès.');
        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.' . $th);
        }
    }

    public function updateEstimation()
    {

        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function saveCategorie(Request $request)
    {

        try {

            //dd($request->all());


            $file = $request->file('file');
            $name_img = $file->getClientOriginalName();
            $storage_data = Storage::disk('public')->put($name_img, file_get_contents($file));


            $prestation = new Prestation;


            $prestation->description = $request->get('description');
            $prestation->name = $request->get('name');
            $prestation->path_icone = $name_img;

            // save du menu nourriture ---- #########
            $prestation->save();

            return redirect()->back()->with('success', 'Opération effectuée avec succès.');
        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.' . $th);
        }
    }

    public function saveEstimation(Request $request)
    {

        try {
            //dd($request->all());
            //code...
            $estimation = new Estimation;
            $estimation->libelle = $request->get('libelle');

            $estimationExiste = Estimation::where('libelle', $request->get('libelle'))->first();

            if ($estimationExiste) {
                return redirect()->back()->with('danger', 'Error.');
            }

            // save du menu nourriture ---- #########
            $estimation->save();

            return redirect()->back()->with('success', 'Opération effectuée avec succès.');
        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.');
        }
    }

    public function listContenus($id)
    {

        $infoUser = $this->Userinfo($id);
        $listContenu = Contenu::all();
        return view('admin.pages', compact('infoUser', 'listContenu'));
    }

    public function listPublicite($id)
    {

        $infoUser = $this->Userinfo($id);
        $listPublicite = Publicite::all();
        return view('admin.publicite', compact('infoUser', 'listPublicite'));
    }

    public function updateImagepub(Request $request)
    {
        try {
            $id = $request->get('id');

            $file = $request->file('image');
            $name_img = $file->getClientOriginalName();
            $storage_data = Storage::disk('public')->put($name_img, file_get_contents($file));


            Publicite::where('id', $id)
                ->update([
                    'path' => $name_img,
                ]);


            return redirect()->back()->with('success', "Opération effectuée avec succès.");
        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.');
        }
    }

    public function updateContenus(Request $request)
    {

        try {
            //code...
            $contenus = $request->get('contenus');
            $id = $request->get('id');

            Contenu::where('id', $id)
                ->update([
                    'contenus' => $contenus,
                ]);

            return redirect()->back()->with('success', 'Opération effectuée avec succès.');
        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.');
        }
    }

    public function deletfiche(Request $request)
    {

        try {
            $id = $request->get('id');

            $image = Fiche::find($id);
            $image->delete();

            return redirect()->back()->with('success', "Opération effectuée avec succès.");
        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.');
        }
    }

    public function deletUser(Request $request)
    {

        try {
            $id = $request->get('id');

            $ficheExist = Fiche::where('id_user', $id)->first();

            /*if($ficheExist){

                $fiche = Fiche::find($id);
                $fiche->delete();

            }*/

            $image = User::find($id);
            $image->delete();

            return redirect()->back()->with('success', "Opération effectuée avec succès.");
        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.');
        }
    }

    public function smsEnvoye($id)
    {

        $infoUser = $this->Userinfo($id);
        $listsms = Smsrapport::all();
        $stock_sms = DB::table('sms')->first();
        return view('admin/smsenvoyer', compact('infoUser', 'listsms', 'stock_sms'));
    }

    public function listCommentaire($id)
    {
        $infoUser = $this->Userinfo($id);
        $commentaire = Commentaire::leftjoin('users', 'users.id', '=', 'commentaires.id_user')
            ->leftjoin('fiches', 'fiches.id', '=', 'commentaires.id_prestataire')
            ->select('fiches.name as prestataire', 'users.name as utilisateur', 'commentaires.contenus', 'commentaires.vote')
            ->get();
        return view('admin/commentaires', compact('infoUser', 'commentaire'));
    }

    public function profilactif($id)
    {
        try {
            //code...
            //dd($request->all());
            //dd($id);

            $user = User::where('id', $id)->first();
            //dd($id);
            if ($user) {
                //dd($evenement);
                $user->update(['confirmation_token' => null]);
                return redirect()->back()->with('success', 'Opération effectuée avec succès.');
            }
        } catch (\Throwable $th) {
            //throw $th;
            //dd($th);
        }
    }

    public function Document(){

    }

    public function sendDocument(Request $request)
    {

        try {
            //code...
            //dd($request->all());

            $file = $request->file('document');
            //dd($image);
            $filename = $input['documentname'] = time() . '.' . $file->getClientOriginalName();
            $destination = public_path('/documents');
            $file->move($destination, $input['documentname']);


            $document = new Folder;

            $document->id_prestataire = $request->get('id');
            $document->path_document = $filename;
            $document->titre_document = $request->get('titre_document');
  

            $document->save();
            

            return redirect()->back()->with('success', 'Opération effectuée avec succès.');
        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.');
        }
    }

    public function lireDocument($id){

        $document = Folder::find($id);
        return response()->file( public_path('/documents/').$document->path_document);

    }

    public function deletDocument(Request $request){

        try {

            $id = $request->get('id');
            $document = Folder::find($id)->delete();

            return redirect()->back()->with('success', 'Opération effectuée avec succès.');
        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.');
        }

    }
}
