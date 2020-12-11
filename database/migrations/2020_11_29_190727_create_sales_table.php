<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            
            $table->id();
            $table->bigInteger('product_id')->nullable();
            $table->bigInteger('comprador_id')->nullable();
            $table->bigInteger('vendedor_id')->nullable();
            $table->string('estado', 100)->nullable()->default('pendiente');
            $table->string('calificacion', 100)->nullable()->default('0');
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
        Schema::dropIfExists('sales');
    }
}
