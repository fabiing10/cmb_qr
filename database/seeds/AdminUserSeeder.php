<?php

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
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
            'userType' => 'super-admin',
            'identification' => 1013636219,
            'name' => 'Fabian Alexander',
            'lastName' => 'Zapata Gracia',
            'email' => 'info@identipet.co',
            'phone' => 3143666151,
            'registerDate' => date('Y-m-d'),
            'username' => 'superadmin',
            'password' => bcrypt('admin@2019')
        ]);

    }
}
