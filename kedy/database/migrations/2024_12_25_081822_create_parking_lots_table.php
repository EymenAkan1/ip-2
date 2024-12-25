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
        Schema::create('parking_lots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            $table->string('name');
            $table->text('description');
            $table->string('location');
            $table->string('longitude');
            $table->string('latitude');
            $table->integer('capacity');
            $table->integer('available_capacity');
            $table->boolean('is_open')->default(false);
            $table->enum('type', ['indoor', 'outdoor', 'underground', 'building', 'garage', 'smart'])->default('indoor');
            $table->boolean('is_available')->default(false);
            $table->boolean('has_valet_service')->default(false);
            $table->boolean('has_cleaning_service')->default(false);
            $table->boolean('has_electric_car_charging')->default(false);
            $table->timestamps();

            $table->foreign('vendor_id')->references('id')->on('vendors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking_lots');
    }
};
