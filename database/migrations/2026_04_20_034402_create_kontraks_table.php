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
        Schema::create('kontraks', function (Blueprint $table) {

            $table->id();

            $table->foreignId('booking_id')
                ->constrained('bookings')
                ->onDelete('cascade');

            $table->string('nomor_kontrak')->unique();

            $table->date('tanggal_kontrak');

            $table->integer('durasi');

            $table->decimal('nilai_kontrak', 15, 2);

            $table->string('file_po')->nullable();

            $table->string('file_spk')->nullable();

            $table->enum('status', [
                'aktif',
                'selesai',
                'dibatalkan'
            ])->default('aktif');

            $table->text('keterangan')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontraks');
    }
};
