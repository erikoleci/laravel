<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToEmailAlerts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('email_alerts', function (Blueprint $table) {
            //
            $table->string('beneficiary_name')->nullable()->after('free_margin');
            $table->string('beneficiary_address')->nullable()->after('beneficiary_name');
            $table->string('bank_name')->nullable()->after('beneficiary_address');
            $table->string('swift')->nullable()->after('bank_name');
            $table->string('iban')->nullable()->after('swift');
            $table->string('full_name')->nullable()->after('iban');
            $table->string('amount')->nullable()->after('full_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('email_alerts', function (Blueprint $table) {
            //
            $table->dropColumn(['beneficiary_name, beneficiary_address,bank_name,swift,iban,full_name,amount']);
        });
    }
}
