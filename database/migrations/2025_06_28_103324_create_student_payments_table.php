<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentPaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('student_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->string('method')->nullable(); // e.g., Cash, Mobile Money, Bank
            $table->string('reference')->nullable(); // e.g., Txn ID
             $table->string('payment_purpose')->nullable();
            $table->string('status')->default('successful');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_payments');
    }
}