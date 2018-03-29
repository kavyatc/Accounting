<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
                  $table->increments('id');
                  $table->char('emp_code')->nullable();
                  $table->string('empname', 50)->nullable();
                  $table->date('birthdate')->nullable();
                  $table->string('address', 1000)->nullable();
                  $table->integer('city_id')->unsigned()->nullable();
                  $table->integer('position_id')->unsigned()->nullable();
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
        Schema::dropIfExists('employees');
    }
}
