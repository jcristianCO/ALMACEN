<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetalleIngreso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('detalle_ingresos', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad_ingresos');
            $table->decimal('precio_ingresos', 11,2);
            $table->timestamps();
          

            
           
                $table->bigInteger('entradas_id')->length(20)->unsigned();
                $table->foreign('entradas_id')
                     ->references('id')->on('entradas');
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
