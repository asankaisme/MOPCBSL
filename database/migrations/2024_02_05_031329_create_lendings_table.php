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
            $table->string('takenBy')->nullable(); //the person from the borrowing department
            $table->foreignId('asset_id')->nullable()->constrained()->cascadeOnUpdate()->onDelete('NO ACTION');
            $table->foreignId('department_id')->nullable()->constrained()->cascadeOnUpdate()->onDelete('NO ACTION');
            $table->date('lendingDate');
            $table->date('returnedDate');
            $table->tinyInteger('isReturned');
            $table->string('remarks');
            $table->tinyInteger('isActive');
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
