
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EnhanceProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            if (!Schema::hasColumn('projects', 'description')) {
                $table->text('description')->nullable()->after('url');
            }
            if (!Schema::hasColumn('projects', 'status')) {
                $table->enum('status', ['active', 'inactive', 'pending', 'completed'])->default('active')->after('description');
            }
            if (!Schema::hasColumn('projects', 'priority')) {
                $table->enum('priority', ['low', 'medium', 'high'])->default('medium')->after('status');
            }
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['description', 'status', 'priority']);
        });
    }
}
