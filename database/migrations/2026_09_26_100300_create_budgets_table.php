<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->date('month');
            $table->decimal('limit_amount', 12, 2);
            $table->timestamps();
            $table->unique(['user_id', 'category_id', 'month']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('budgets');
    }
};
