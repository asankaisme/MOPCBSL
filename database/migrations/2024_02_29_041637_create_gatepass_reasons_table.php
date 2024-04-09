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
        Schema::create('gatepass_reasons', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('reason', 100)->nullable();
            $table->string('status', 1)->nullable()->default('A');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gatepass_reasons');
    }
};
