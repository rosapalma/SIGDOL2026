<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Models\Personal;

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
        $personal = Personal::where('cedula','=',$input['cedula'])->first();
        Validator::make($input, [
            'cedula' => ['required','exists:personals,cedula'],
            'email' => ['required'],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'personal_id' => $personal['id'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'privilege' => 3,
            'statud' => 1,
        ]);
    }
}
