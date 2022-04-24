<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForignKeyEntradaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entradas', function (Blueprint $table) {
            //
            /* $table->bigInteger('producto_id')->length(20)->unsigned();
            $table->foreign('producto_id')
                 ->references('id')->on('productos');

                 $table->bigInteger('producto_sigmas_id')->length(20)->unsigned();
                 $table->foreign('producto_sigmas_id')
                      ->references('id')->on('producto_sigmas');
 */
                      $table->bigInteger('proveedor_id')->length(20)->unsigned();
                      $table->foreign('proveedor_id')
                           ->references('id')->on('proveedors');

                    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entrda', function (Blueprint $table) {
            //
        });
    }
}
