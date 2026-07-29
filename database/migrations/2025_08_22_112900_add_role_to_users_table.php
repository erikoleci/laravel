<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * account_id doubles as both the staff role (admin, manager,
     * officemanager, teamleader, caposala, customer_service, affiliator)
     * and, for regular customers, their account tier label (e.g.
     * bull_bear, kings, phoenix, black_panther, promo) - referenced
     * throughout the app via logged_in()->account_id.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('account_id')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('account_id');
        });
    }
};
