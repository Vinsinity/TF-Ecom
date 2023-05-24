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
        Schema::create('theme_settings', function (Blueprint $table) {
            $table->unsignedBigInteger('theme_id')->unique();
            $table->foreign('theme_id')->references('id')->on('themes')->cascadeOnDelete();

            $table->json('general');
            $table->json('product');
            $table->json('category');
            $table->json('header');
            $table->json('home');
            $table->json('footer');
            $table->json('appearance');
            $table->primary(['theme_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theme_settings');
    }
};
