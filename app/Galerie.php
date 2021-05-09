<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galerie extends Model
{
    //
    
    protected $fillable = [
      'id_user', 'path'
    ];
}
