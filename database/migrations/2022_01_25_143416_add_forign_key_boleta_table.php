<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForignKeyBoletaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salidas', function (Blueprint $table) {
            //
          /*   $table->bigInteger('producto_id')->length(20)->unsigned();
            $table->foreign('producto_id')
                 ->references('id')->on('productos');

                 $table->bigInteger('producto_sigmas_id')->length(20)->unsigned();
                 $table->foreign('producto_sigmas_id')
                      ->references('id')->on('producto_sigmas'); */

                      $table->bigInteger('ues_id')->length(20)->unsigned();
                      $table->foreign('ues_id')
                           ->references('id')->on('u_e_s');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salidas', function (Blueprint $table) {
            //
        });
    }
}
