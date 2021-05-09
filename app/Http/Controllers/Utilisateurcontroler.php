<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Utilisateurcontroler extends Controller
{
    //

    public function inscriptionUtilisateur()
    {
       $data=[];

       return view('template.inscription')->with($data);
    }
}
