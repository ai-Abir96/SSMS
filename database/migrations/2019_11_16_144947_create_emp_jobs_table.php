<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('emp_id')-unsigned();
            $table->string('emp_name');
            $table->string('designation');
            $table->string('salaray');
            $table->string('bonus');
            $table->string('status');
            $table->string('signing_date');
            $table->string('departing_date');
            $table->timestamps();
            $table-> foreign('emp_id')->references('id')->on('emp_infos')->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emp_jobs');
    }
}
