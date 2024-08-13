<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstG extends Model
{
    use HasFactory;
    protected $table = 'const_g_s';

    protected $fillable = [
        'codigo','personal_id','fechaEmi','typeConst','user_id',
    ];

    public function personal()
    {
    return $this->belongsTo(Personal::class);
    }
}
