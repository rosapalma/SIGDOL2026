<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condicionlaboral extends Model
{
    use HasFactory;
    protected $table = 'condicionlaborals';
    protected $fillable = [	'name','abrev',	];

    public function empleados() 
    {
        return $this->hasMany(Personal::class);
    }
}
