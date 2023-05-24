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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('order_number')->unique();
            $table->unsignedBigInteger('order_status_id');
            $table->unsignedBigInteger('cargo_id');
            $table->unsignedBigInteger('discount_code_id');
            $table->integer('total_price');
            $table->integer('cargo_price');
            $table->integer('tax_price');
            $table->integer('subtotal_price');
            $table->integer('total_quantity');
            $table->integer('total_discount_price');
            $table->unsignedBigInteger('user_address_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('order_status_id')->references('id')->on('order_statuses');
            $table->foreign('cargo_id')->references('id')->on('cargos');
            $table->foreign('discount_code_id')->references('id')->on('discount_codes');
            $table->foreign('user_address_id')->references('id')->on('user_addresses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
