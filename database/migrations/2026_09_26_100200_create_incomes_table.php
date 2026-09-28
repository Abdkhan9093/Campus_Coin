<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->date('income_date');
            $table->string('source');
            $table->string('description')->nullable();
            $table->decimal('amount', 12, 2);
            $table->boolean('recurring')->default(false);
            $table->timestamps();
            $table->index(['user_id', 'income_date']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('incomes');
    }
};
