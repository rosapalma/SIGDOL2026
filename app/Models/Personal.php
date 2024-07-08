<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    protected $fillable = ['cedula','name', 'last_name','email','fec_ing','fec_egre',
    'sexo','spacework_id','condicionlaboral_id','typepers_id', 'cargo_id', 'jerarquia','tiempo_dedicacion',
    'porcentaje_jub_pens','sede_id'];
	protected $table = 'personals';
	protected $primaryKey = 'id';
}
