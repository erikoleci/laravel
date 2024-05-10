<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('requestId')->nullable();
            $table->string('orderId')->nullable();
            $table->double('amount', 8, 2)->nullable();
            $table->string('currencyCode')->nullable();
            $table->string('ccNumber')->nullable();
            $table->string('cardId')->nullable();
            $table->string('responseTime')->nullable();
            $table->string('resultCode')->nullable();
            $table->string('resultMessage')->nullable();
            $table->string('errorCode')->nullable();
            $table->string('errorMessage')->nullable();
            $table->string('advice')->nullable();
            $table->string('reasonCode')->nullable();
            $table->string('signature')->nullable();
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
        Schema::dropIfExists('transaction_logs');
    }
}
