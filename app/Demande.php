<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    //
    protected $fillable = [
        'id_prestataire', 'name', 'phone','email','message','statu',
    ];

    
}
