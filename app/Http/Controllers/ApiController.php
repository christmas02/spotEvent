<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ApiController extends Controller
{
    //

    public function getUsers(){
        $listUser = User::all();
        return response()->json(['statu'=>1, 'listUser' => $listUser]);
    }

    public function login(Request $request)
    {
        $inputVal = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $inputVal['email'], 'password' => $inputVal['password']))){
            if(auth()->user()->confirmation_token != null){
                return response()->json(['statu'=>1, 'message' => 'Compte inactive']);
            }else{
                if (auth()->user()->role == 3){
                    return redirect()->route('administrateur');
                    $lieu = 'welcome/tableau/administrateur';
                    //return response()->json(['statu'=> 3, 'lien' => $lieu]);
                }elseif(auth()->user()->role == 2){
                    return redirect()->route('prestataire');
                    $lieu = 'welcome/tableau/gesttion';
                    //return response()->json(['statu'=> 2, 'lien' => $lieu]);
                }elseif(auth()->user()->role == 1){
                    $role = 1;
                    return response()->json(['statu'=>1, 'role' => $role]);
                }else{
                    $role = 0;
                    return response()->json(['statu'=>0, 'role' => $role]);
                }
            }

        }else{
            return response()->json(['statu'=>0, 'message' => 'Echec de connexion']);
        }
    }



}
