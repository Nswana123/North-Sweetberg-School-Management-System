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
       Schema::create('test_questions', function (Blueprint $table) {
    $table->id();
    $table->foreignId('test_id')->constrained()->onDelete('cascade');
    $table->text('question');
    $table->enum('type', ['multiple_choice', 'text']);
    $table->json('options')->nullable(); // A, B, C, D
    $table->string('correct_answer')->nullable();
    $table->integer('marks');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_questions');
    }
};
