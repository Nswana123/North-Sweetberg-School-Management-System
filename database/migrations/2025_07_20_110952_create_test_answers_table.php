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
       Schema::create('test_answers', function (Blueprint $table) {
    $table->id();
    $table->foreignId('test_id')->constrained();
    $table->foreignId('question_id')->constrained('test_questions');
    $table->foreignId('student_id')->constrained();
    $table->text('answer');
    $table->integer('marks_awarded')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_answers');
    }
};
