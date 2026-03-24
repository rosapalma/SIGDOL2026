<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NominaExcel extends Model
{
    use HasFactory;
    protected $fillable = ['personal_id','salario_basico', 'prima_fliar','prima_por_hijos',
    'prima_profe','prima_tsu','prima_maestria','prima_hijo_especial','prima_antiguedad','prima_especializacion','prima_act_univ', 'prima_chofer',
    'tota_asignaciones','salario_integral','seguro_social','aseta','isrl','satiutecpri','pension_alimenticia',
    'paro_forzoso','ley_politica','cappaoupel','total_deducciones','salario_neto','primera_qna','segunda_qna',
    'bono_nocturno','beca','mes','anio'];
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
