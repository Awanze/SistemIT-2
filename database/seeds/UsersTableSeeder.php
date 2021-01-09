<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\User::create([
            'name' => 'Anggy',
            'email' => 'anggy123@gmail.com',
            'nohp' => '08973923323',
            'password' => bcrypt('1'),
            'role_id' => 1
     ]);
     
     App\User::create([
            'name' => 'Aris',
            'email' => 'aris123@gmail.com',
            'nohp' => '089285292589',
            'password' => bcrypt('2'),
            'role_id' => 4
     ]);
     
     App\User::create([
            'name' => 'Teguh',
            'email' => 'teguh123@gmail.com',
            'nohp' => '0815894584',
            'password' => bcrypt('3'),
            'role_id' => 2
     ]);     
    }
}
