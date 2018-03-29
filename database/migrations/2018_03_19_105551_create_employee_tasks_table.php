<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id')->unsigned()->nullable();
            $table->integer('emp_id')->unsigned()->nullable();
            $table->datetime('startdatetime')->nullable();
            $table->datetime('enddatetime')->nullable();
            $table->integer('status')->nullable();
            $table->integer('trasnferred_id')->unsigned()->nullable();
            $table->text('comments')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_tasks');
    }
}
