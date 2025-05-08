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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Add user_id column
    
            // Optionally, add foreign key constraint (assuming you have a users table)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table ->string('room_id')->nullable();
            $table ->string('name')->nullable();
            $table ->string('email')->nullable();
            $table ->string('phone')->nullable();
            $table ->string('start_date')->nullable();
            $table ->string('end_date')->nullable();
            $table->string('payment_method');
            $table->enum('status', ['pending', 'approve', 'cancelled', 'waiting'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');
        Schema::dropIfExists('bookings');
    }
};
