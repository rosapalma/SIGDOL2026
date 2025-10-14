<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autoridad extends Model
{
    use HasFactory;
    protected $fillable = ['spacework_id', 'personal_id', 'autentication','statud'];


    public function personal() 
    {
        return $this->belongsTo(Personal::class);
    }
}
