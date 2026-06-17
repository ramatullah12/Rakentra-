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
        Schema::create('maintenances', function (Blueprint $table) {

            $table->id();

            $table->foreignId('alat_id')
                ->constrained('alats')
                ->onDelete('cascade');

            $table->foreignId('inspeksi_id')
                ->nullable()
                ->constrained('inspeksis')
                ->onDelete('cascade');

            $table->date('tanggal_maintenance');

            $table->string('jenis_maintenance');

            $table->text('deskripsi_kerusakan');

            $table->text('tindakan_perbaikan')
                ->nullable();

            $table->decimal('biaya', 15, 2)
                ->default(0);

            $table->enum('status', [
                'pending',
                'diproses',
                'selesai'
            ])->default('pending');

            $table->string('foto_perbaikan')
                ->nullable();

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
        Schema::dropIfExists('maintenances');
    }
};
