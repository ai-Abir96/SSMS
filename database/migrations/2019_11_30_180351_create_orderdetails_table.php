<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_no')->unique();
            $table->string('from');
            $table->string('to');
            $table->decimal('total_amount');
            $table->decimal('amount_paid');
            $table->string('status');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('orderdetails');
    }
}
