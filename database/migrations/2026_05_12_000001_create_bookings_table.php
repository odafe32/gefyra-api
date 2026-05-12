<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('service_type');
            $table->text('message')->nullable();
            $table->date('booking_date');
            $table->string('booking_time');
            $table->string('status')->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();

            // Indexes for common queries
            $table->index('email');
            $table->index('booking_date');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
