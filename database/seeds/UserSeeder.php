<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('users')->insert([
            'nip'=>'1611521020',
            'role_id'=> 1,
            'username'=> 'Pln',
            'email'=>'pln123@gmail.com',
            'password'=>bcrypt('12345678'),
            'remember_token'=>Str::random(5),
        ]);
        DB::table('users')->insert([
            'nip'=>'10101001',
            'role_id'=> 2,
            'username'=> 'Astri',
            'email'=>'astriastri@gmail.com',
            'password'=>bcrypt('aciaci'),
            'remember_token'=>Str::random(5),
        ]);
    }

}
