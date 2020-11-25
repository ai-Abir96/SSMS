<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEPersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_personal_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ep_user_id')->unsigned();
            $table->string('emp_image');
            $table->string('emp_fname');
            $table->string('emp_lname');
            $table->string('employee_nid');
            $table->date('emp_birth_date');
            $table->integer('emp_age');
            $table->string('emp_gender');
            $table->string('emp_blood');
            $table->string('emp_marital_status');
            $table->timestamps();
            $table->foreign('ep_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('e_personal_infos');
    }
}
