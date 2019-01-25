<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchemaInitial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Table Users
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userType')->nullable();
            $table->boolean('active')->nullable()->default(false);
            $table->string('identification', 225)->nullable();
            $table->string('name', 225)->nullable();
            $table->string('lastName', 225)->nullable();
            $table->boolean('haveCode')->nullable();
            $table->boolean('activeCode')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->date('registerDate')->nullable();
            $table->string('registerType')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->jsonb('authAccess')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        //Table Pets
/*
        Schema::create('Pets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('petType')->nullable();
            $table->integer('petStatus')->nullable();
            $table->integer('searchPetId')->nullable();//Search Actually Id History  || Default is 0
            $table->boolean('petRequest')->nullable();
            $table->string('name', 225)->nullable();
            $table->integer('age')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('gender', 5)->nullable();
            $table->jsonb('characteristics')->nullable();
            $table->jsonb('vaccines')->nullable();
            $table->text('phone', 225)->nullable();
            $table->string('description')->nullable();
            $table->jsonb('imageProfile')->nullable();
            $table->jsonb('imageGalery')->nullable();
            $table->timestamps();
        });
        */
        //Table OwnersPets
        /*
        Schema::create('OwnersPets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId')->unsigned();
            $table->foreign('userId')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->integer('petId')->unsigned();
            $table->foreign('petId')
                ->references('id')->on('Pets')
                ->onDelete('cascade');
            $table->timestamps();
        });
        */
        /*
        //Table Codes
        Schema::create('Codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codes',5)->nullable();
            $table->boolean('status')->nullable();
            $table->integer('userId')->unsigned();
            $table->foreign('userId')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->date('dayActivation')->nullable();
            $table->text('description')->nullable();
            $table->date('dateAssign')->nullable();
            $table->timestamps();
        });

        */
        Schema::create('Events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description')->nullable();
            $table->integer('userId')->unsigned();
            $table->foreign('userId')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });


        /*
        //Table Pets-Suscriptions
        Schema::create('UserSuscriptions', function (Blueprint $table) {
            $table->increments('id');
            // Foreign key Pets
            $table->integer('userId')->unsigned();
            $table->foreign('userId')
                ->references('id')->on('users')
                ->onDelete('cascade');
            // Foreign Key Codes
            $table->integer('codeId')->unsigned();
            $table->foreign('codeId')
                ->references('id')->on('Codes')
                ->onDelete('cascade');
            $table->string('suscriptionType', 50)->nullable();
            $table->date('suscriptionDate')->nullable();
            $table->timestamps();
        });
        */

        //Table Pets Characteristics
        /*Schema::create('Characteristics', function (Blueprint $table) {
            $table->increments('id');
            $table->jsonb('colors')->nullable();
            $table->jsonb('species')->nullable();
            $table->jsonb('races')->nullable();
            $table->jsonb('sizes')->nullable();
            $table->jsonb('petTypes')->nullable();
            $table->jsonb('clinicalHistories')->nullable();
            $table->timestamps();
        });*/
        /*
        Schema::create('Characteristics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('petType')->nullable();
            $table->string('race')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
        */
        //Table Searches-Pets
        /*
        Schema::create('SearchPets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('petId')->unsigned();
            $table->foreign('petId')
                ->references('id')->on('Pets')
                ->onDelete('cascade');
            $table->integer('status')->nullable();
            $table->boolean('public')->nullable();
            $table->date('lossDate')->nullable();
            $table->date('foundDate')->nullable();
            $table->jsonb('location')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
        */
        //Table Searches-Histories
        /*
        Schema::create('SearchHistories', function (Blueprint $table) {
            $table->increments('id');
            // Foreign key Users
            $table->integer('searchPetId')->unsigned();
            $table->foreign('searchPetId')
                ->references('id')->on('SearchPets')
                ->onDelete('cascade');
            $table->boolean('notify')->unsigned();
            $table->jsonb('location')->nullable();
            $table->jsonb('images')->nullable();
            $table->date('date')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
        */
        //Table Veterinary
        /*
        Schema::create('Veterinary', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identification')->nullable();
            $table->string('name')->nullable();
            $table->string('url')->nullable();
            $table->string('email')->nullable();
            $table->text('description')->nullable();
            $table->jsonb('characteristics')->nullable();
            $table->integer('qualification')->nullable();
            $table->integer('suscriptionType')->nullable();
            $table->date('dateSuscription')->nullable();
            $table->timestamps();
        });
        */
        //Table Headquarters
        /*
        Schema::create('Headquarters', function (Blueprint $table) {
            $table->increments('id');
            // Foreign key Veterinary
            $table->integer('veterinaryId')->unsigned();
            $table->foreign('veterinaryId')
                ->references('id')->on('Veterinary')
                ->onDelete('cascade');
            $table->boolean('principal')->nullable();
            $table->string('nameHeadquarter')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('phone', 225)->nullable();
            $table->string('movil', 225)->nullable();
            $table->string('url', 225)->nullable();
            $table->string('email', 225)->nullable();
            $table->jsonb('coordinates')->nullable();
            $table->jsonb('characteristics')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
        */
        //Table Medical Appointment
        /*
        Schema::create('MedicalAppointments', function (Blueprint $table) {
            $table->increments('id');
            // Foreign key Pets
            $table->integer('petId')->unsigned();
            $table->foreign('petId')
                ->references('id')->on('Pets')
                ->onDelete('cascade');
            // Foreign key Headquarters
            $table->integer('headquarterId')->unsigned();
            $table->foreign('headquarterId')
                ->references('id')->on('Headquarters')
                ->onDelete('cascade');
            $table->jsonb('properties')->nullable();
            $table->string('status')->nullable();
            $table->dateTime('dateTime')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
        */
        //Table Users Veterinary
        /*
        Schema::create('UsersVeterinarians', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userType'); // Client - Employee - Admin
            // Foreign key Users
            $table->integer('userId')->unsigned();
            $table->foreign('userId')
                ->references('id')->on('users')
                ->onDelete('cascade');
            // Foreign key Headquarters
            $table->integer('headquarterId')->unsigned();
            $table->foreign('headquarterId')
                ->references('id')->on('Headquarters')
                ->onDelete('cascade');
            $table->timestamps();
        });
        */
        //Table Clinic Histories
        /*
        Schema::create('ClinicHistories', function (Blueprint $table) {
            $table->increments('id');
            // Foreign key Pets
            $table->integer('petId')->unsigned();
            $table->foreign('petId')
                ->references('id')->on('Pets')
                ->onDelete('cascade');
            // Foreign key Headquarters
            $table->jsonb('reference');
            $table->jsonb('characteristics');
            $table->timestamps();
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
