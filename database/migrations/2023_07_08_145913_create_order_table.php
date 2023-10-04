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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->cosntrained('users');
            //$table->foreignId('investor_id')->constrained('investor');
            $table->foreignId('stock_id')->constrained('stocks');
            $table->integer('quantity');
            //$table->foreignId('small_business_id')->constrained('small_business');
            $table->string('orderType');
            $table->dateTime('created_at')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
