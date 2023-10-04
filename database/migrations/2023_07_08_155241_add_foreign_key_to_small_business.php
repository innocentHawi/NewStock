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
        /*Schema::table('small_business', function (Blueprint $table) {
            Schema::table('small_business', function (Blueprint $table) {
                $table->foreignId('portfolio_id')->nullable()->constrained('portfolio');

            });
        });*/
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       /* Schema::table('small_business', function (Blueprint $table) {
            //
        });*/
    }
};
