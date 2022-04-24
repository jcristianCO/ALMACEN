<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetalleSalidaBoletas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('detalle_salidas_boletas', function (Blueprint $table) {
        $table->id('id');

            
            $table->integer('cantidad_salidas');
            $table->decimal('precio_salidas', 11,2);
            

            $table->timestamps();

            //Relations
            $table->bigInteger('salidas_id')->length(20)->unsigned();
            $table->foreign('salidas_id')
                 ->references('id')->on('salidas');
                 $table->bigInteger('productos_id')->length(20)->unsigned();
            $table->foreign('productos_id')
                 ->references('id')->on('productos');
                 $table->bigInteger('producto_sigmas_id')->length(20)->unsigned();
                 $table->foreign('producto_sigmas_id')
                      ->references('id')->on('producto_sigmas'); 
            
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
