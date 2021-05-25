<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use App\Favori;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
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
                    //return redirect()->route('administrateur');
                    
                    $user = [
                        'name' => auth()->user()->name,
                        'id'   => auth()->user()->id,
                        'email' => auth()->user()->email,
                        'phone' => auth()->user()->phone
                    ];
                    $lieu = 'welcome/tableau/administrateur/'.auth()->user()->id;
                    return response()->json(['statu'=> 3, 'lien' => $lieu, 'user'=> $user]);
                }elseif(auth()->user()->role == 2){
                    //return redirect()->route('prestataire');

                    $user = [
                        'name' => auth()->user()->name,
                        'id'   => auth()->user()->id,
                        'email' => auth()->user()->email,
                        'phone' => auth()->user()->phone
                    ];
                    $lieu = 'welcome/tableau/gesttion/'.auth()->user()->id;
                    return response()->json(['statu'=> 2, 'lien' => $lieu, 'user'=> $user]);
                }elseif(auth()->user()->role == 1){
                    $role = 1;
                    $favoris = Favori::where('id_user',auth()->user()->id)->get();
                    $user = [
                        'name' => auth()->user()->name,
                        'id'   => auth()->user()->id,
                        'email' => auth()->user()->email,
                        'phone' => auth()->user()->phone
                    ];
                    return response()->json(['statu'=>1, 'role' => $role, 'user'=> $user, 'favoris' => $favoris]);
                }else{
                    $role = 0;
                    return response()->json(['statu'=>0, 'role' => $role]);
                }
            }
            
        }else{
            return response()->json(['statu'=>0, 'message' => 'Echec de connexion']);
        }     
    }


    protected function credentials(Request $request)
    {
        return array_merge(
            $request->only($this->username(), 'password'),
            ['confirmation_token' => null]
        );
    }
}
