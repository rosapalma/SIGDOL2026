<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ps extends Model
{
      protected $fillable = ['pregunta'];


    public function user() 
    {
        return $this->hasMany(User::class);
    }
}
