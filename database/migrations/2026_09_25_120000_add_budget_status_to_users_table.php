<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->decimal('budget_amount', 12, 2)->default(0)->after('password');
            $table->enum('status', ['active', 'inactive'])->default('active')->after('budget_amount');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['budget_amount', 'status']);
        });
    }
};
