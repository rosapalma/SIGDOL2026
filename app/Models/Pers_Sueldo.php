<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pers_Sueldo extends Model
{
    use HasFactory;
    protected $fillable = [ 'personal_id', 'dedication', 'porcentaje_jub_pens', 'salario_base', 'salario_integral',];
    protected $table = 'pers_sueldos';
    protected $primaryKey = 'id';
    
    public function empleados() 
    {
        return $this->hasMany(Personal::class);
    }
}
