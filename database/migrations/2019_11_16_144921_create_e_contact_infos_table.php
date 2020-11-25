<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEContactInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_contact_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ec_user_id')->unsigned();
            $table->string('emp_phone1',11);
            $table->string('emp_phone2',11);
            $table->string('emp_email');
            $table->string('emp_preaddress');
            $table->string('emp_peraddress');
            $table->timestamps();
            $table->foreign('ec_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('e_contact_infos');
    }
}
