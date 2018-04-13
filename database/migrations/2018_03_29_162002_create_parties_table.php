<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('party_code', 10)->unique();
            $table->string('party_name', 50)->unique();
            $table->string('party_type', 25);            
            $table->string('address', 1000)->nullable();
            $table->string('email', 50)->nullable();
            $table->integer('city_id')->unsigned();
            $table->string('currency_code', 3);
            $table->decimal('opening_bal', 16, 2)->default(0.00);
            $table->string('openingbal_type', 2)->default('Dr');
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('parties');
    }
}
