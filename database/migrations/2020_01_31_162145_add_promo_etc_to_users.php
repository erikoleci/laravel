<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPromoEtcToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('promo_code')->default(null)->after('image');
            $table->boolean('over_18')->default(false)->after('promo_code');
            $table->boolean('accept_terms')->default(false)->after('over_18');
            $table->string('full_name_bank')->default(false)->after('accept_terms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('promo_code');
            $table->dropColumn('over_18');
            $table->dropColumn('accept_terms');
            $table->dropColumn('full_name_bank');
        });
    }
}
