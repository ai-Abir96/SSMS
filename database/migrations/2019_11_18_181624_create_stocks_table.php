<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('p_code')->nullable()->unique();
            $table->string('p_name')->nullable();
            $table->bigInteger('fcat_id')->unsigned();
            $table->bigInteger('fscat_id')->unsigned();
            $table->bigInteger('fsup_id')->nullable()->unsigned();
            $table->integer('quantity')->nullable();
            $table->float('st_price')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('fsup_id')->references('id')->on('suppliers')->onCascade('delete');
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
        Schema::dropIfExists('stocks');
    }
}
