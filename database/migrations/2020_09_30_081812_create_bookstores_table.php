<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookstoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookstores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('complement');
            $table->string('adresse');
            $table->string('ville');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('coordinates');
            $table->string('code_insee');
            $table->string('adresse_complet');
            $table->string('siret');
            $table->string('mail');
            $table->string('telephone');
            $table->string('site');
            $table->string('nom_city_ver');
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
        Schema::dropIfExists('bookstores');
    }
}
