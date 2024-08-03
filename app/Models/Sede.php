<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;
    protected $fillable = ['codigo', 'name', 'abrev', 'url', 'active', 'type', 'direc', 'phone', 'city', 'headquarters'];

    public function personals() 
    {
        return $this->hasMany(Personal::class);
    }


}
