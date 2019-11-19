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
            $table->string('p_code')->nullable();
            $table->string('p_name')->nullable();
            $table->bigInteger('fcat_id')->nullable()->unsigned();
            $table->bigInteger('fscat_id')->nullable()->unsigned();
            $table->string('p_price')->nullable();
            $table->string('p_vat')->nullable();
            $table->string('p_discount')->nullable();
            $table->timestamps();

            $table->foreign('fcat_id')->references('id')->on('categories')->onCascade('delete');
            $table->foreign('fscat_id')->references('id')->on('sub_categories')->onCascade('delete');
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
