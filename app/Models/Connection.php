<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'connection_id',
        'request',
    ];
    
}
