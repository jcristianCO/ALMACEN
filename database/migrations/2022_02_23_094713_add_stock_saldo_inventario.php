<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStockSaldoInventario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id('id');
    
            $table->integer('entrada');
            $table->integer('salida');
            $table->integer('saldo');
                
                
                
    
                
    
                //Relations
                
                     $table->bigInteger('productos_id')->length(20)->unsigned();
                $table->foreign('productos_id')
                     ->references('id')->on('productos');
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
