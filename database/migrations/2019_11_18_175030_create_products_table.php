<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fp_code')->nullable()->unique();
            $table->string('p_name')->nullable();
            $table->string('p_image')->nullable();
            $table->string('p_price')->nullable();
            $table->string('p_vat')->nullable();
            $table->string('p_discount')->nullable();
            $table->timestamps();

            $table->foreign('fp_code')->references('p_code')->on('stocks')->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
