<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('flight_statuses', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('status_name')->unique(); // e.g. Scheduled, Cancelled
            $table->timestamps();
        });

        // Insert default statuses
        DB::table('flight_statuses')->insert([
            ['status_name' => 'Scheduled'],
            ['status_name' => 'Cancelled'],
            ['status_name' => 'Completed']
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('flight_statuses');
    }
};
