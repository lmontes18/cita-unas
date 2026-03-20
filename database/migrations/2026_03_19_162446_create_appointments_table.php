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
       Schema::create('appointments', function (Illuminate\Database\Schema\Blueprint $table) {
    $table->id();
    $table->foreignId('service_id')->constrained();
    $table->string('client_name');
    $table->string('client_phone');
    $table->dateTime('start_time');
    $table->dateTime('end_time'); // Calculado con la duración del servicio
    $table->text('notes')->nullable();
    $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
