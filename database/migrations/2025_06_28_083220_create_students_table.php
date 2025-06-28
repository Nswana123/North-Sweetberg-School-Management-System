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
      Schema::create('students', function (Blueprint $table) {
    $table->id();

    $table->foreignId('user_id')->constrained()->onDelete('cascade');

    $table->foreignId('campus_id')->constrained()->onDelete('cascade');
    $table->foreignId('school_id')->constrained()->onDelete('cascade');
    $table->foreignId('department_id')->constrained()->onDelete('cascade');
    $table->foreignId('program_id')->constrained()->onDelete('cascade');

    $table->integer('year_of_study')->default(1);
    $table->string('status')->default('active'); // active, graduated, suspended, etc.

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
