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
        Schema::create('bookings', function (Blueprint $table) {

            $table->id();

            $table->foreignId('pelanggan_id')
                ->constrained('pelanggans')
                ->onDelete('cascade');

            $table->foreignId('alat_id')
                ->constrained('alats')
                ->onDelete('cascade');

            $table->date('tanggal_booking');

            $table->date('tanggal_mulai');

            $table->date('tanggal_selesai');

            $table->text('keterangan')->nullable();

            $table->enum('status', [
                'pending',
                'disetujui',
                'berjalan',
                'selesai',
                'dibatalkan'
            ])->default('pending');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
