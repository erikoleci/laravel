<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_alerts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sender_id')->nullable();
            $table->integer('receiver_id')->nullable();
            $table->string('type')->default('alert')->nullable();
            $table->string('subject')->nullable();
            $table->text('content')->nullable();
            $table->integer('account_number')->default(0);
            $table->double('balance', 8, 2)->default(0)->nullable();
            $table->double('credit', 8, 2)->default(0)->nullable();
            $table->double('equity', 8, 2)->default(0)->nullable();
            $table->double('margin', 8, 2)->default(0)->nullable();
            $table->double('free_margin', 8, 2)->default(0)->nullable();
            $table->boolean('read')->default(0)->nullable();
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
        Schema::dropIfExists('email_alerts');
    }
}
