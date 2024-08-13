<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NominaExcel extends Model
{
    use HasFactory;
    protected $fillable = ['nomina_id','fecha','monto','sede_id','user_id'];
    public function empleados() 
    {
        return $this->hasMany(Personal::class);
    }
}
