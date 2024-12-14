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
        Schema::create('valet_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservation_id');
            $table->unsignedBigInteger('valet_id');
            $table->timestamp('vehicle_taken_at');
            $table->timestamp('vehicle_parked_at');
            $table->text('description')->nullable();
            $table->boolean('incident_reported')->default(false);
            $table->string('incident_details')->nullable();
            $table->decimal('damage_cost', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
            $table->foreign('valet_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('valet_logs');
    }
};
