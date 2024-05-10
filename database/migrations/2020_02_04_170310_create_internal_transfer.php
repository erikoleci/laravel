<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalTransfer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->double('amount', 8, 2);
            $table->integer('user_id');
            $table->string('type')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('currency')->default('eur');
            $table->string('reason')->nullable();
            $table->string('email')->nullable();
            $table->string('debited_name')->nullable();
            $table->string('debited_account_type')->nullable();
            $table->string('debited_account_id')->nullable();
            $table->string('credited_name')->nullable();
            $table->string('credited_account_type')->nullable();
            $table->string('credited_account_id')->nullable();
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
        Schema::dropIfExists('internal_transfers');
    }
}
