<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->date('taskdate')->nullable();
            $table->integer('product_id')->unsigned()->nullable();
            $table->integer('project_id')->unsigned()->nullable();
            $table->text('task')->nullable();
            $table->integer('priority')->nullable();
            $table->integer('status')->nullable();
            $table->string('assigned',1)->nullable();
            $table->integer('emp_id')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
