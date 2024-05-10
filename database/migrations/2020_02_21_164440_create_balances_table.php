<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->double('deposit', 8, 2)->default(0)->nullable();
            $table->double('collateral', 8, 2)->default(0)->nullable();
            $table->double('margin', 8, 2)->default(0)->nullable();
            $table->double('free_margin', 8, 2)->default(0)->nullable();
            $table->string('currency', 10)->default(0)->nullable();
            $table->double('bonus', 8, 2)->default(0)->nullable();
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
        Schema::dropIfExists('balances');
    }
}
