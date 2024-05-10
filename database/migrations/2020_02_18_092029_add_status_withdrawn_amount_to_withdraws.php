<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusWithdrawnAmountToWithdraws extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('withdraws', function (Blueprint $table) {
            //
            $table->boolean('refunded')->default(0)->after('reason')->nullable();
            $table->double('withdrawn_amount', 8, 2)->after('refunded')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('withdraws', function (Blueprint $table) {
            //
            $table->dropColumn(['refunded', 'withdrawn_amount']);

        });
    }
}
