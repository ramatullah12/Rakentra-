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
        Schema::create('tagihans', function (Blueprint $table) {

            $table->id();

            $table->foreignId('kontrak_id')
                ->constrained('kontraks')
                ->onDelete('cascade');

            $table->string('nomor_tagihan')
                ->unique();

            $table->date('tanggal_tagihan');

            $table->date('jatuh_tempo');

            $table->decimal('subtotal', 15, 2);

            $table->decimal('ppn', 15, 2)
                ->default(0);

            $table->decimal('total', 15, 2);

            $table->enum('status_tagihan', [
                'pending',
                'dibayar',
                'jatuh_tempo'
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
        Schema::dropIfExists('tagihans');
    }
};
