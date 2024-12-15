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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('plate')->unique()->nullable();
            $table->unsignedBigInteger('make_id')->nullable();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->year('year')->nullable();
            $table->string('color');
            $table->enum('type', ['car', 'motorcycle', 'truck', 'van', 'bus', 'bicycle']);
            $table->enum('fuel_type', ['petrol', 'diesel', 'electric', 'hybrid', 'hydrogen', 'biodiesel', 'e85', 'lng'])->nullable();
            $table->boolean('is_suv')->default(false)->nullable();
            $table->boolean('is_electric')->default(false)->nullable();
            $table->enum('role', ['owner', 'renter', 'guest']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('make_id')->references('id')->on('makes')->onDelete('cascade');
            $table->foreign('model_id')->references('id')->on('models')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
