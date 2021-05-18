<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Notifications\RegisteredUser;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    public function confirm($id, $token)
    {
        $user = User::where('id',$id)->where('confirmation_token', $token)->first();
        if($user){
            $user->update(['confirmation_token' => null]);
            $this->guard()->login($user);
            return redirect($this->redirectPath())->with('success','votre compte a bien été confirmé');

        }else{
            return redirect('/connexion')->with('error','Ce lien  ne semble plus valide');
        }
    }

      /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        //dd($request['role']);
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        $user->notify(new RegisteredUser());
        //$this->guard()->login($user);
        $role = $request->role;
        if($role == 1){
            //return redirect('inscriptionPrestataire')->with('success','Votre compte à bien été créer. un lien de confirmation vous a été envoyé à votre adresse email afin de finaliser votre inscription');
            return response()->json(['statu'=>1, 'role' => $role]);
        }elseif($role == 2){
            //return redirect('inscriptionUtilisateur')->with('success','Votre compte à bien été créer. un lien de confirmation vous a été envoyé à votre adresse email afin de finaliser votre inscription');
            return response()->json(['statu'=>1, 'role' => $role]);
        }else{
            return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
        }

    }


    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required'],
            'role' => ['required',]
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
            'confirmation_token'=> str_replace('/','',bcrypt(str_random(16)))
        ]);
    }
}
