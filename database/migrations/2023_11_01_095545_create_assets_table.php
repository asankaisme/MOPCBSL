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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('category_id')->nullable()->constrained()->cascadeOnUpdate()->onDelete('NO ACTION');
            $table->string('assetName')->nullable();
            $table->string('faNo')->nullable();
            $table->string('serialNo')->nullable();
            $table->string('lendingDate')->nullable();
            $table->boolean('isReturned')->nullable();
            $table->string('remarks')->nullable();
            $table->tinyInteger('isActive')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
