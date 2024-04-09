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
        Schema::create('gatepasses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('serialNo', 10)->nullable();
            $table->string('companyName')->nullable();
            $table->string('personName', 100)->nullable();
            $table->string('personNIC', 12)->nullable();
            $table->dateTime('validityDate')->nullable();
            $table->string('reason', 1)->nullable();
            $table->unsignedBigInteger('createdBy')->nullable();
            $table->date('createdDate')->nullable();
            $table->unsignedBigInteger('authBy')->nullable();
            $table->dateTime('authDate')->nullable();
            $table->string('status', 1)->nullable(); //N-New,E-edited,A-approved,D-deleted

            $table->foreign('createdBy')->references('id')->on('users')->constrained()->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('authBy')->references('id')->on('users')->constrained()->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gatepasses');
    }
};
