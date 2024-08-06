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
        Schema::create('cab_vouchers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('requesterName')->nullable();
            $table->date('requestDate')->nullable();
            $table->string('cv_from')->nullable();
            $table->string('cv_to')->nullable();
            $table->string('cab_no')->nullable();
            $table->string('vehicle_no')->nullable();
            $table->decimal('amount')->nullable();
            $table->string('remarks')->nullable();
            $table->integer('isActive')->nullable()->default(1);

            $table->foreign('requesterName')->references('id')->on('users')->cascadeOnUpdate()->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cab_vouchers');
    }
};
