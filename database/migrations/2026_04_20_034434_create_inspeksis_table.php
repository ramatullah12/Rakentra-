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
        Schema::create('inspeksis', function (Blueprint $table) {

            $table->id();

            $table->foreignId('alat_id')
                ->constrained('alats')
                ->onDelete('cascade');

            $table->foreignId('operasional_id')
                ->nullable()
                ->constrained('operasionals')
                ->onDelete('cascade');

            $table->date('tanggal_inspeksi');

            $table->enum('kondisi_alat', [
                'baik',
                'rusak_ringan',
                'rusak_berat'
            ]);

            $table->text('hasil_inspeksi');

            $table->string('foto_kerusakan')
                ->nullable();

            $table->enum('status', [
                'pending',
                'proses',
                'selesai'
            ])->default('pending');

            $table->text('keterangan')
                ->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspeksis');
    }
};
