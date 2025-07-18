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
        Schema::create('student_addresses', function (Blueprint $table) {
    $table->id();

    $table->foreignId('student_id')->constrained('students')->onDelete('cascade');

    $table->string('physical_address')->nullable();
    $table->string('postal_address')->nullable();
    $table->string('town')->nullable();
    $table->string('province')->nullable();
    $table->string('country')->default('Zambia');

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_addresses');
    }
};
