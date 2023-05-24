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
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('theme_type_id');
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->string('screenshot');
            $table->string('path');
            $table->json('settings');
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('default')->default(0);

            $table->foreign('theme_type_id')->references('id')->on('theme_types')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('themes');
    }
};
