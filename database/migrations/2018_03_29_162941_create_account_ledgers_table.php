<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_ledgers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group_id',5);
            $table->string('subgroup_id',5);
            $table->string('account_code', 5)->unique();
            $table->string('account_name', 50)->unique();
            $table->string('currency_code', 3);
            $table->decimal('opening_bal', 16, 2)->default(0.00);
            $table->string('openingbal_type', 2)->default('Dr');
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
        Schema::dropIfExists('account_ledgers');
    }
}
