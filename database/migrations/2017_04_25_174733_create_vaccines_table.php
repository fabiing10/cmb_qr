<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      /*
      Schema::create('Vaccines', function (Blueprint $table) {
          $table->increments('id');
          // Foreign key Users
          $table->integer('petId')->unsigned();
          $table->foreign('petId')
              ->references('id')->on('Pets')
              ->onDelete('cascade');
          $table->jsonb('vaccines')->nullable();
          $table->integer('agePet')->unsigned();
          $table->string('sticker')->unsigned();
          $table->string('typeVaccine')->unsigned();
          $table->string('date')->unsigned();
          $table->string('lote')->unsigned();
          $table->string('laboratory')->unsigned();
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
