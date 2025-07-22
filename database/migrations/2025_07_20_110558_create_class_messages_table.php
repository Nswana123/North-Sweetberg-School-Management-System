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
      Schema::create('class_messages', function (Blueprint $table) {
    $table->id();
    $table->foreignId('class_id')->constrained()->onDelete('cascade');
    $table->foreignId('sender_id')->constrained('users');
    $table->text('message')->nullable();
    $table->string('voice_note')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_messages');
    }
};
