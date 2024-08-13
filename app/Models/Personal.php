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


	public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }

    public function typepers()
    {
        return $this->belongsTo(Typepers::class);
    }

    public function spacework()
    {
        return $this->belongsTo(Spaceswork::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    
    public function condicionlaboral()
    {
        return $this->belongsTo(Condicionlaboral::class);
    }

    public function jefe()
    {
        return $this->hasOne(Autoridad::class);
    }


    public function contrato()
    {
        return $this->hasMany(Contrato::class);
    }

    public function constGs()
    {
        return $this->hasMany(ConstG::class);
    }

    public function recibGs()
    {
        return $this->hasMany(RecibosG::class);
    }

    public function beneficiarios()
    {
        return $this->hasMany(Beneficiarios::class);
    }



    //********RELACION IMPORT EXCEL******************

    public function salario() //+ detalles que hacen incidencia en sueldo basico y sueldo integral
    {
        return $this->belongsTo(Emple_Sueldo::class);
    }

    public function nominasExcel() //nominas con conceptos
    {
        return $this->hasMany(NominaExcel::class);
    }



}
