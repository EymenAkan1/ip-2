<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('towns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('district_id');
            $table->string('name');

            $table->foreign('district_id')->references('id')->on('districts');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('towns');
    }
};
