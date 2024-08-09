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
            $table->integer('bank_id')->nullable();
            $table->date('requestDate')->nullable();
            $table->string('cv_provider')->nullable();
            $table->string('cv_number')->nullable();
            $table->string('cv_from')->nullable();
            $table->string('cv_to')->nullable();
            $table->string('cab_no')->nullable();
            $table->string('vehicle_no')->nullable();
            $table->decimal('amount')->nullable();
            $table->string('remarks')->nullable();
            $table->unsignedBigInteger('issuedBy')->nullable();
            $table->integer('isActive')->nullable()->default(1);
            $table->string('status')->nullable();
            

            $table->foreign('requesterName')->references('id')->on('users')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreign('issuedBy')->references('id')->on('users')->cascadeOnUpdate()->restrictOnDelete();
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
