<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('stock_name')->unique();
            $table->integer('current_purchaseprice');
            $table->integer('past_purchaseprice')->nullable();
            $table->integer('past1_purchaseprice')->nullable();
            $table->integer('past2_purchaseprice')->nullable();
            $table->integer('quantity');
            $table->foreignId('user_id')->cosntrained('users');
            $table->string('type')->default('stock');//new
            //$table->foreignId('small_business_id')->constrained('small_business');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
