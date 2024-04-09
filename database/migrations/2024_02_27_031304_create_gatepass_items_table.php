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
        Schema::create('gatepass_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('gatepass_id')->constrained()->onUpdate('cascade')->onDelete('restrict');
            $table->string('itemName')->nullable();
            $table->string('serialNo')->nullable();
            $table->string('faNo')->nullable();
            $table->string('qty')->nullable();
            $table->string('remarks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gatepass_items');
    }
};
