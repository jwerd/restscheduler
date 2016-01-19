<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShiftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('manager_id')->unsigned();
            $table->integer('employee_id')->unsigned();
            $table->float('break');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->timestamps();

            // FK constriants
            $table->foreign('manager_id')->references('id')->on('users');
            $table->foreign('employee_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shifts');
    }
}
