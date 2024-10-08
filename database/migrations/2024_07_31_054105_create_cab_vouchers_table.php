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
            $table->foreign('requesterName')->references('id')->on('users')->constrained()->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->integer('bank_id')->nullable();
            $table->date('requestDate')->nullable();
            $table->string('cv_provider')->nullable();
            $table->string('cv_number')->nullable();
            $table->string('cv_from')->nullable();
            $table->string('cv_to')->nullable();
            $table->string('cab_no')->nullable();
            $table->string('vehicle_no')->nullable();
            $table->decimal('km_done')->nullable();
            $table->decimal('amount')->nullable();
            $table->string('remarks')->nullable();
            $table->string('status')->nullable();
            $table->tinyInteger('isActive')->nullable()->default(1);
            $table->unsignedBigInteger('issuedBy')->nullable();
            $table->foreign('issuedBy')->references('id')->on('users')->constrained()->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
