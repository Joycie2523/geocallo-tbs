<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('flight_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('booking_status_id')->default(1);

            $table->dateTime('booking_time');
            $table->string('seat_number')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->string('payment_status')->default('pending');
            $table->timestamps();

            $table->foreign('flight_id')
                  ->references('id')->on('flights')
                  ->onDelete('cascade');

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

            $table->foreign('booking_status_id')
                  ->references('id')->on('booking_statuses')
                  ->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
}
