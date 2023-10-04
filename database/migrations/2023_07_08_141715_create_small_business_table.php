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
        Schema::create('small_business', function (Blueprint $table) {
            $table->id();
            //$table->string('business_name')->unique();
            $table->foreignId('user_id')->cosntrained('users');
            //$table->foreignID('portfolio_id')->constrained('portfolio'); ->fk
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('small_business');
    }
};
