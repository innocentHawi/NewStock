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
        Schema::create('portfolio', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->integer('purchase_price');
            $table->foreignId('stock_id')->constrained('stocks');
            $table->string('stock_name');
            $table->integer('current_purchaseprice')->nullable();
            $table->foreignId('user_id')->cosntrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio');
    }
};
