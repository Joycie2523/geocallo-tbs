<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('booking_statuses', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('status_name')->unique(); // e.g. Pending, Confirmed, Cancelled
            $table->timestamps();
        });

        DB::table('booking_statuses')->insert([
            ['status_name' => 'Pending'],
            ['status_name' => 'Confirmed'],
            ['status_name' => 'Cancelled']
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_statuses');
    }
};
