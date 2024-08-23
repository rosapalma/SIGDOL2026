<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{

    //DE  PRUEBASSS IMPOR- JUNTO A USERSCONTROLLER
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'personal_id' => $row[0],
            'email'    => $row[1], 
            'password' => Hash::make($row[2]),
            'privilege' => $row[3],
            'statud' => $row[4],
        ]);
    }
}
