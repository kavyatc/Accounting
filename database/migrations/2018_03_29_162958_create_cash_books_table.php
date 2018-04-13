<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trans_type', 3);
            $table->string('voucherno', 10)->unique();
            $table->datetime('accountdate');   
            $table->string('currency_code', 3);
            $table->decimal('amount', 16, 2)->default(0.00);
            $table->string('account_party_type', 1);  
            $table->integer('account_party_id')->unsigned();
            $table->integer('cashaccount_id')->unsigned();                    
            $table->text('narration')->nullable();
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
        Schema::dropIfExists('cash_books');
    }
}
