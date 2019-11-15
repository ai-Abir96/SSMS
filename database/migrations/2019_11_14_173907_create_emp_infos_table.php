<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_infos', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('emp_user_id')->unsigned();
          $table->string('emp_image');
          $table->string('emp_fname');
          $table->string('emp_lname');
          $table->string('emp_phone1');
          $table->string('emp_phone2');
          $table->string('emp_email');
          $table->string('employee_nid');
          $table->string('emp_birth_date');
          $table->string('emp_age');
          $table->string('emp_preaddress');
          $table->string('emp_peraddress');
          $table->string('emp_marital_status');
          $table->timestamps();

          $table->foreign('emp_user_id')->references('id')->on('users')->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emp_infos');
    }
}
