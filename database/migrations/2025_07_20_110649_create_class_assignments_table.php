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
     Schema::create('class_assignments', function (Blueprint $table) {
    $table->id();
    $table->foreignId('class_id')->constrained()->onDelete('cascade');
    $table->foreignId('lecturer_id')->constrained('users');
    $table->string('title');
    $table->text('instructions');
    $table->date('due_date');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_assignments');
    }
};
