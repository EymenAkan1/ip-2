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
        Schema::create('worker_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservation_id'); // İlgili rezervasyon
            $table->unsignedBigInteger('worker_id'); // İlgili çalışan
            $table->string('work_type'); // İş türü: "vale", "temizlik"

            // Ortak alan
            $table->timestamp('started_at')->nullable(); // İşin başlangıç zamanı
            $table->timestamp('completed_at')->nullable(); // İşin bitiş zamanı
            $table->boolean('completed')->default(false); // İş tamamlandı mı

            // Vale alanı
            $table->string('vehicle_taken_location')->nullable(); // Araç alındığı konum
            $table->string('vehicle_parked_location')->nullable(); // Araç park edildiği konum

            // Temizlik alanı
            $table->string('cleaning_type')->nullable(); // Temizlik türü: "iç", "dış", "her ikisi"

            // Kaza
            $table->boolean('incident_reported')->default(false);
            $table->text('incident_details')->nullable();
            $table->decimal('damage_cost', 10, 2)->nullable();

            $table->timestamps();

            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
            $table->foreign('worker_id')->references('id')->on('users')->onDelete('cascade');
        });    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('valet_logs');
    }
};
