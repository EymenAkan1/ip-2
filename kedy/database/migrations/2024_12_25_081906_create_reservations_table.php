<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('parking_lot_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('worker_id')->nullable();
            $table->timestamp('reservation_start_time');
            $table->timestamp('reservation_end_time');
            $table->enum('duration_type', ['minute', 'hour', 'day', 'week', 'month', 'year'])->default('hour'); //form ile alakalı bu satırı nasıl bağlayacağım bakılacak
            $table->enum('reservation_status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('pending'); //burası da bakılacak
            $table->decimal('price', 6, 2)->default(0);
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('users');
            $table->foreign('vendor_id')->references('id')->on('users');
            $table->foreign('worker_id')->references('id')->on('users');
            $table->foreign('parking_lot_id')->references('id')->on('parking_lots');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
