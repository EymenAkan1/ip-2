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
        Schema::create('models', function (Blueprint $table) {
            $table->id(); // Otomatik artan birincil anahtar
            $table->string('make_id'); // Make ile ilişki
            $table->string('name'); // Model adı
            $table->string('year');
            $table->timestamps();

            $table->foreign('make_id')->references('id')->on('makes')->onDelete('cascade'); // Yabancı anahtar
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('models');
    }
};
