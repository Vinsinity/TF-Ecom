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
        Schema::create('company_settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('authorized_person')->nullable();
            $table->string('company_shortname')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('gsm')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('company_address')->nullable();
            $table->string('branch_addresses')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('tax_code')->nullable();
            $table->string('tax_county')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_settings');
    }
};
