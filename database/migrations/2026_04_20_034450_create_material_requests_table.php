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
        Schema::create('material_requests', function (Blueprint $table) {

            $table->id();

            $table->foreignId('maintenance_id')
                ->constrained('maintenances')
                ->onDelete('cascade');

            $table->foreignId('mekanik_id')
                ->constrained('mekaniks')
                ->onDelete('cascade');

            $table->string('nama_material');

            $table->integer('jumlah');

            $table->string('satuan');

            $table->decimal('harga', 15, 2)
                ->default(0);

            $table->string('supplier')
                ->nullable();

            $table->enum('status', [
                'pending',
                'disetujui',
                'ditolak',
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
        Schema::dropIfExists('material_requests');
    }
};
