<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyDeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_deeds', function (Blueprint $table) {
            $table->id('idcopia');
            $table->timestamps();
            $table->string('nombrepropietario');
            $table->string('apellidopaterno');
            $table->string('apellidomaterno');
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
        Schema::dropIfExists('property_deeds');
    }
}
