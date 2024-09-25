<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str, Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        //usuario administrado
        DB::table('users')->insert([
            'personal_id'=> 1,
			'email' => 'virginia.palma.ipm@upel.edu.ve',
			'email_verified_at' => now(),
            'privilege' => 1,
            'password' => Hash::make('123123123'),
            'statud' => 1,
            'remember_token' => Str::random(10),
		]);

           //usuario con privilegios
        DB::table('users')->insert([
            'personal_id'=> 2,
			'email' => 'ugo.irama.ipm@upel.edu.ve',
			'email_verified_at' => now(),
            'privilege' => 2,
            'password' => Hash::make('MORENOCESAR'),
            'statud' => 1,
            'remember_token' => Str::random(10),
		]);
           //usuario de recursos
        DB::table('users')->insert([
            'personal_id'=> 3,
			'email' => 'melendez.jose.ipm@upel.edu.ve',
			'email_verified_at' => now(),
            'privilege' => 3,
            'password' => Hash::make('IRAMALUGO'),
            'statud' => 1,
            'remember_token' => Str::random(10),
		]);
    }
}
