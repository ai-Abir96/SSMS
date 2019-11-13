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
          $table->string('employee_fname');
          $table->string('employee_lname');
          $table->string('employee_image');
          $table->string('employee_nid');
          $table->string('employee_birth_date');
          $table->string('employee_address');
          $table->string('employee_contact_no');
          $table->string('employee_alternate_cn');
          $table->string('employee_email');
          $table->string('employee_marital_status');
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
        Schema::dropIfExists('emp_infos');
    }
}
