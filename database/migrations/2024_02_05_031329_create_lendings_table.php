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
        Schema::create('lendings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('asset_id')->nullable()->constrained()->cascadeOnUpdate()->onDelete('NO ACTION');
            $table->foreignId('department_id')->nullable()->constrained()->cascadeOnUpdate()->onDelete('NO ACTION');
            $table->date('lendingDate');
            $table->string('taken_by')->nullable(); //the person from the borrowing department
            $table->unsignedBigInteger('issued_by')->nullable();
            $table->foreign('issued_by')->references('id')->on('users')->constrained()->onUpdate('cascade')->onDelete('NO ACTION');
            $table->date('returned_date')->nullable();
            $table->tinyInteger('isReturned')->nullable();
            $table->string('remarks')->nullable();
            $table->tinyInteger('isActive')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lendings');
    }
};
