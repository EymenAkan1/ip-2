<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('neighbourhoods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('town_id');
            $table->string('name');

            $table->foreign('town_id')->references('id')->on('towns');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('neighbourhoods');
    }
};
