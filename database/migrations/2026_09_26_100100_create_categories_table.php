<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->enum('type', ['income', 'expense']);
            $table->boolean('is_default')->default(false);
            $table->timestamps();
        });

        $income = ['Allowance', 'Part-time Job', 'Scholarship', 'Gift', 'Other Income'];
        $expense = ['Food', 'Transport', 'Hostel/Rent', 'Academics', 'Subscriptions', 'Entertainment', 'Miscellaneous'];

        foreach ($income as $name) {
            DB::table('categories')->insert(['name' => $name, 'type' => 'income', 'is_default' => true, 'created_at' => now(), 'updated_at' => now()]);
        }

        foreach ($expense as $name) {
            DB::table('categories')->insert(['name' => $name, 'type' => 'expense', 'is_default' => true, 'created_at' => now(), 'updated_at' => now()]);
        }
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
