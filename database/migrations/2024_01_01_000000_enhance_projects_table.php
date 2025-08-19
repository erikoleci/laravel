
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EnhanceProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('projects')) {
            Schema::table('projects', function (Blueprint $table) {
                if (!Schema::hasColumn('projects', 'description')) {
                    $table->text('description')->nullable();
                }
                if (!Schema::hasColumn('projects', 'status')) {
                    $table->string('status')->default('active');
                }
                if (!Schema::hasColumn('projects', 'priority')) {
                    $table->integer('priority')->default(1);
                }
                if (!Schema::hasColumn('projects', 'due_date')) {
                    $table->date('due_date')->nullable();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('projects')) {
            Schema::table('projects', function (Blueprint $table) {
                if (Schema::hasColumn('projects', 'description')) {
                    $table->dropColumn('description');
                }
                if (Schema::hasColumn('projects', 'status')) {
                    $table->dropColumn('status');
                }
                if (Schema::hasColumn('projects', 'priority')) {
                    $table->dropColumn('priority');
                }
                if (Schema::hasColumn('projects', 'due_date')) {
                    $table->dropColumn('due_date');
                }
            });
        }
    }
}
