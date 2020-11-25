<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEEmergancyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_emergancy_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ee_user_id')->unsigned();
            $table->string('ec_name',64);
            $table->string('ec_phone1',11);
            $table->string('ec_phone2',11);
            $table->string('ec_gender');
            $table->string('ec_relation');
            $table->string('ec_address');
            $table->timestamps();
            $table->foreign('ee_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('e_emergancy_infos');
    }
}
