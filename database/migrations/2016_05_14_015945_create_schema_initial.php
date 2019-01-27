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
            $table->string('secondLastName', 225)->nullable();
            $table->string('iglesia', 225)->nullable();
            $table->string('zona', 225)->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->date('registerDate')->nullable();
            $table->string('registerType')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('Events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description')->nullable();
            $table->integer('userId')->unsigned();
            $table->foreign('userId')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });


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
