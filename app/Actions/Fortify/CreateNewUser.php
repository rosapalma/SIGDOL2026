<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Models\Personal;
use App\Models\ps;
use Carbon\Carbon;


class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {   
    
        $validator = Validator::make($input, [
            'cedula' => ['required','exists:personals,cedula','unique:users'],
            'email' => ['required','email', 'ends_with:@upel.edu.ve','unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();



       $personal = Personal::where('cedula','=',$input['cedula'])->first();
        


        return User::create([
            'personal_id' => $personal['id'],
            'cedula'=> $input['cedula'],
            'email' => $input['email'],
            'ps1_id' => $input['ps1'],
            'ps2_id' => $input['ps2'],
            'resp1' => Hash::make($input['resp1']),
            'resp2' => Hash::make($input['resp2']),
            'password' => Hash::make($input['password']),
            'email_verified_at' =>  Carbon::now(),
            'privilege' => 3,
            'statud' => 1,
        ]);
    
    }
}
