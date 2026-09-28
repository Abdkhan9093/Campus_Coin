<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('academic_year')->nullable()->after('status');
            $table->decimal('monthly_savings_goal', 12, 2)->default(0)->after('academic_year');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['academic_year', 'monthly_savings_goal']);
        });
    }
};
