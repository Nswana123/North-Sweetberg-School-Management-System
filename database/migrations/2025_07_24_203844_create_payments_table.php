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
       Schema::create('payments', function (Blueprint $table) {
    $table->id();
    $table->foreignId('admission_id')->constrained()->onDelete('cascade');
    $table->string('payment_mode');
    $table->decimal('amount', 10, 2);
    $table->string('payment_number')->nullable(); // mobile money
    $table->string('card_number')->nullable();
    $table->string('card_expiry')->nullable();
    $table->string('card_cvc')->nullable();
    $table->string('bank_name')->nullable();
    $table->string('account_number')->nullable();
    $table->string('transaction_reference')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
