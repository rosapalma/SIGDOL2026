<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    use HasFactory;
    protected $fillable = ['personal_id', 'cedula','full_name', 'fec_nac','porcentaje'];

    public function empleados() 
    {
        return $this->hasMany(Personal::class);
    }
}
