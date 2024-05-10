<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSourceAmountToDeposits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deposits', function (Blueprint $table) {
            //
            $table->double('source_amount', 8, 2)->after('currency');
            $table->string('source_currency', 10)->after('source_amount');
            $table->string('source')->after('credit_card_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deposits', function (Blueprint $table) {
            //
            $table->dropColumn(['source_amount', 'source_currency', 'from']);
        });
    }
}
