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
            'password' => bcrypt('1013636219')
        ]);
/*
        DB::table('users')->insert([
            'userType' => 'admin',
            'identification' => 1013636219,
            'name' => 'Fabian Alexander',
            'lastName' => 'Zapata Gracia',
            'birthdate' => '1992-11-07',
            'email' => 'identipet@gmail.com',
            'phones' => '{"name":"3870102", "phone":"3143666151"}',
            'address' => 'Cra 11 # 65c-70 sur',
            'registerDate' => date('Y-m-d'),
            'username' => 'identipet',
            'password' => bcrypt('identipet@2016')
        ]);

        DB::table('users')->insert([
            'userType' => 'admin',
            'identification' => 1013636219,
            'name' => 'Fabian Alexander',
            'lastName' => 'Zapata Gracia',
            'birthdate' => '1992-11-07',
            'email' => 'identipet@gmail.com',
            'phones' => '{"name":"3870102", "phone":"3143666151"}',
            'address' => 'Cra 11 # 65c-70 sur',
            'registerDate' => date('Y-m-d'),
            'username' => 'identipet-sede',
            'password' => bcrypt('identipet@2016')
        ]);
*/
        /* Create Veterinary */
        /*
        $veterinaryId = DB::table('Veterinary')->insert([
            'identification' => '',
            'name' => 'Identipet',
            'url' => 'http://identipet.co/',
            'email' => 'identipet@gmail.com',
            'description' => 'Lorem ipsum',
            'suscriptionType' => 1,
            'dateSuscription' => date('Y-m-d')
        ]);
        //Sedes Principal IdentiPet (Bogota)
        $sede1 = DB::table('Headquarters')->insert([
            'veterinaryId' => 1,
            'principal' => true,
            'country' => 'Colombia',
            'city' => 'Bogota',
        ]);
        //Sede Medellin
        $sede2 =DB::table('Headquarters')->insert([
            'veterinaryId' => 1,
            'principal' => false,
            'nameHeadquarter' => 'Perros Y gatos',
            'country' => 'Colombia',
            'city' => 'Medellin'
        ]);

        //Asignar Administrador
        DB::table('UsersVeterinarians')->insert([
            'userType' => 'admin',
            'userId' => 1,
            'headquarterId' => 1
        ]);
        //Asignar Administrador
        DB::table('UsersVeterinarians')->insert([
            'userType' => 'admin',
            'userId' => 2,
            'headquarterId' => 1
        ]);
        DB::table('UsersVeterinarians')->insert([
            'userType' => 'admin',
            'userId' => 3,
            'headquarterId' => 1
        ]);


*/


    }
}
