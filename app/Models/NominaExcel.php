<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NominaExcel extends Model
{
    use HasFactory;
    protected $fillable = [
        'personal_id',
        'salario_basico', 
        'prima_fliar',
        'prima_hijos',
        'prima_profe',
        'prima_tsu',
        'prima_maestria',
        'prima_hijo_especial',
        'prima_antiguedad',
        'prima_pregrado',
        'prima_especializacion',
        'prima_act_univ',
        'prima_doctorado',
        'prima_chofer',
        'prima_titular',
        'jerarquia_nivel1',
        'jerarquia_nivel2',
        'jerarquia_nivel3',
        'jerarquia_nivel4',
        'jerarquia_nivel5',
        'jerarquia_nivel6',
        'jerarquia_nivel7',
        'jerarquia_nivel8',
        'jerarquia_nivel9',
        'jerarquia_nivel10',
        'totals_asignaciones',
        'salario_integral',
        'seguro_social',
        'paro_forzoso',
        'ley_politica',
        'capaupel_docentes',
        'cappaoupel_adm_obr',
        'aproupel_seccional_docentes',
        'aproupel_nacional_docentes',
        'asoprojupel_doc_jub',
        'aseta_adm',
        'satiutecpri_obrero',
        'pension_alimenticia',
        'fondo_ipp',
        'islr',
        'total_deducciones',
        'salario_neto',
        'primera_qna',
        'segunda_qna',
        'bono_nocturno',
        'beca','mes','anio'];
    protected $table = 'nomina_excels';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }

    public function constanciasG()
    {
        return $this->hasOne(ConstG::class);
    }
    public function recibosG()
    {
        return $this->hasOne(RecibosG::class);
    }


}
