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
        Schema::create('mobilisasis', function (Blueprint $table) {

            $table->id();

            $table->foreignId('kontrak_id')
                ->constrained('kontraks')
                ->onDelete('cascade');

            $table->foreignId('vendor_id')
                ->constrained('vendors')
                ->onDelete('cascade');

            $table->date('tanggal_kirim');

            $table->date('tanggal_kembali')
                ->nullable();

            $table->string('lokasi_proyek');

            $table->enum('status', [
                'dijadwalkan',
                'dikirim',
                'sampai',
                'pengembalian',
                'selesai'
            ])->default('dijadwalkan');

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
        Schema::dropIfExists('mobilisasis');
    }
};
