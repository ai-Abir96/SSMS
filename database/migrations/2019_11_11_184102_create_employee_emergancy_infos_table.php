<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeEmergancyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_emergancy_infos', function (Blueprint $table) {
            $table->bigIncrements('employee_emergancy_id');
            $table->string('employee_id');
            $table->string('employee_e_name');
            $table->string('employee_e_address');
            $table->string('employee_e_primary_contact');
            $table->string('employee_e_alternate_contact');
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
        Schema::dropIfExists('employee_emergancy_infos');
    }
}
