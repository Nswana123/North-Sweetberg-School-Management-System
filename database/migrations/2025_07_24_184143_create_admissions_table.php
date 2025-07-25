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
        Schema::create('admissions', function (Blueprint $table) {
               $table->id();
    $table->string('program');
    $table->string('title');
    $table->string('first_name');
    $table->string('last_name');
    $table->date('dob');
    $table->string('gender');
    $table->string('national_id');
    $table->string('email');
    $table->string('phone');
    $table->string('alt_phone')->nullable();
    $table->string('street_address');
    $table->string('city');
    $table->string('province');
    $table->string('postal_code')->nullable();
    $table->string('next_of_kin_name');
    $table->string('next_of_kin_relationship');
    $table->string('next_of_kin_phone');
    $table->string('next_of_kin_alt_phone')->nullable();
    $table->string('secondary_school');
    $table->year('completion_year');
    $table->string('id_document_path')->nullable();
    $table->string('certificates_path')->nullable();
    $table->string('photo_path')->nullable();
     $table->string('admission_status')->default('pending');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
