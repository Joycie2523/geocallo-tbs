<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('flight_number')->unique();
            $table->string('origin');
            $table->string('destination');
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->unsignedBigInteger('flight_status_id')->default(1); // default to 'Scheduled'
            $table->timestamps();

            $table->foreign('flight_status_id')->references('id')->on('flight_statuses')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
