<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favori extends Model
{
    //

    protected $fillable = [
        'id_user', 'id_prestataire',
    ];
    
}
