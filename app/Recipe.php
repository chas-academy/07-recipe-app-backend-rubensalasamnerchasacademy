<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //

    /* protected $fillable = ['user_id, title']; */
    protected $fillable = ['title', 'email', 'img'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}

