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
        Schema::create('harga_sewas', function (Blueprint $table) {

            $table->id();

            $table->foreignId('alat_id')
                ->constrained('alats')
                ->onDelete('cascade');

            $table->decimal('harga_harian', 15, 2);

            $table->decimal('harga_mingguan', 15, 2)
                ->nullable();

            $table->decimal('harga_bulanan', 15, 2)
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
        Schema::dropIfExists('harga_sewas');
    }
};
