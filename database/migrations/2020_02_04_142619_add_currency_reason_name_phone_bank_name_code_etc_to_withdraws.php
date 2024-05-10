<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCurrencyReasonNamePhoneBankNameCodeEtcToWithdraws extends Migration
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
            $table->string('currency')->after('bonus');
            $table->string('reason')->after('currency');
            $table->string('name')->after('reason');
            $table->string('phone')->after('name');
            $table->string('bank_name')->after('phone');
            $table->string('code')->after('bank_name');
            $table->string('iban')->after('code');
            $table->string('bank_account')->after('iban');
            $table->string('bank_account_title')->after('bank_account');
            $table->string('bank_address')->after('bank_account_title');
            $table->string('intermediary_bank')->after('bank_address');
            $table->string('intermediary_bank_address')->after('intermediary_bank');
            $table->string('intermediary_bank_aba')->after('intermediary_bank_address');
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
            $table->dropColumn(['currency', 'reason', 'name', 'phone', 'bank_name','code','iban','bank_account','bank_account_title','bank_address', 'intermediary_bank']);
        });
    }
}
