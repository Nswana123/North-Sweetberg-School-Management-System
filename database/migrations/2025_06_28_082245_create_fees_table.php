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
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
              $table->foreignId('program_id')->constrained()->onDelete('cascade');
            $table->integer('year_of_study');
            $table->decimal('amount', 10, 2);
                // New: Minimum % of amount to be paid before registration is allowed
            $table->unsignedTinyInteger('registration_threshold')->default(50); // e.g., 50%

            // New: Minimum % of amount to be paid before exams are allowed
            $table->unsignedTinyInteger('exam_threshold')->default(75); // e.g., 75%
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
