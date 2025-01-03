<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('car_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('make_id');
            $table->text('model_name');

            $table->foreign('make_id')->references('id')->on('car_makes');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('car_models');
    }
};
