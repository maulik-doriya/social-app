<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTechnology extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'technology_name',
    ];
    
}
