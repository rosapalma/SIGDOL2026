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
        //DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        //DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        //usuario administrado
        DB::table('users')->insert([
            'personal_id'=> 1,
			'email' => 'virginia.palma.ipm@upel.edu.ve',
			'email_verified_at' => now(),
            'ps1_id' => 5,
            'ps2_id' => 6,
            'resp1' => Hash::make('pabellon'),
            'resp2' => Hash::make('krisni'),
            'privilege' => 1,
            'password' => Hash::make('123123123'),
            'statud' => 1,
            'remember_token' => Str::random(10),
		]);
    }
}
