<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUESTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('u_e_s', function (Blueprint $table) {
            $table->id();
            $table->integer('codinfra');
            $table->integer('sie');
            $table->string('ue');
            $table->string('director')->nullable();
            $table->string('teldirec')->nullable();
            $table->string('direccion')->nullable();
            $table->integer('telefono')->nullable();
            $table->string('turno')->nullable();
            $table->string('distrito')->nullable();
            $table->string('dependencia')->nullable();
            
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
        Schema::dropIfExists('u_e_s');
    }
}
