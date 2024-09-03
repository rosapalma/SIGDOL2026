<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecibosG extends Model
{
    use HasFactory;
    protected $fillable = ['codigo','fechaEmi','nomina_id','personal_id','user_id' ];


    public function empleado() 
    {
        return $this->belongsTo(Personal::class, 'personal_id');
    }


}
