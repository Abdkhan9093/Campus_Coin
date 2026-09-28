<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->date('expense_date');
            $table->string('category', 100);
            $table->string('description', 255);
            $table->decimal('amount', 12, 2);
            $table->timestamps();

            $table->index(['user_id', 'expense_date']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('expenses');
    }
};
