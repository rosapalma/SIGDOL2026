<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    use HasFactory;
    protected $fillable = ['personal_id', 'nac','cedula','full_name', 'fec_nac','porcentaje','fec_pension','total_pension'];


    public function empleados() 
    {
        return $this->hasMany(Personal::class);
    }
}
