<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccionUser extends Model
{
       protected $fillable = [
        'user_id',
        'accion',
    ];

    public function Users() //nominas de excel con conceptos 
    {
        return $this->belongsTo(User::class);
    }
}
