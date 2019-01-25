<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'userType' => 'admin',
            'identification' => 1023033553,
            'name' => 'Fabian Alexander',
            'lastName' => 'Zapata Gracia',
            'email' => 'identipet@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('logistica@2019')
        ]);
    }
}
