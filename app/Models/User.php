<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
//use Illuminate\Auth\Passwords\CanResetPasswordr;

class User extends Authenticatable //implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;


    protected $fillable = [
        'personal_id',
        'cedula',
        'email',
        'ps1_id',
        'ps2_id',
        'resp1',
        'resp2',
        'password',
        'statud',
        'privilege',
        'user_created',
    ];


    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }
    public function ps()
    {
        return $this->hasMany(ps::class);
    }

    // public function sede()
    // {
    //     return $this->hasOneThrough(Personal::class, Sede::class);
    // }


}
