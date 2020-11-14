<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscriturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escrituras', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->string('nombrepropietario');
                $table->string('apellidopat');
                $table->string('apellidomat');
                $table->string('notaria');
                $table->string('expediente');
                $table->integer('tomo');
                $table->integer('numeroescritura');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escrituras');
    }
}
