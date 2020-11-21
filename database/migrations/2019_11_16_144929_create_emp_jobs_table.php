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
            $table->bigInteger('emp_id')->unsigned();
            $table->bigInteger('position_id')->unsigned();
            $table->integer('salary');
            $table->string('status');
            $table->date('signing_date');
            $table->date('departing_date')->nullable();
            $table->timestamps();

            $table-> foreign('emp_id')->references('id')->on('users')->onDelete('cascade');
            $table-> foreign('position_id')->references('id')->on('emp_positions')->onDelete('cascade');
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
