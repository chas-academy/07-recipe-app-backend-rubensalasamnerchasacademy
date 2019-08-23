<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Recipe extends Model
{
    //

    protected $fillable = ['user_id', 'title', 'img'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}

