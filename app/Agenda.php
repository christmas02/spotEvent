<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    //

    protected $fillable = [
        'id_user', 'date_event','titre','heur'
    ];
}
