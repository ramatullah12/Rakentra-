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
        Schema::create('operasionals', function (Blueprint $table) {

            $table->id();

            $table->foreignId('mobilisasi_id')
                ->constrained('mobilisasis')
                ->onDelete('cascade');

            $table->date('tanggal');

            $table->integer('hour_meter');

            $table->string('lokasi');

            $table->integer('jam_operasional');

            $table->string('penggunaan_alat');

            $table->bigInteger('biaya_operasional')
                ->default(0);

            $table->enum('status_unit', [
                'standby',
                'operasional',
                'maintenance',
                'rusak'
            ])->default('operasional');

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
        Schema::dropIfExists('operasionals');
    }
};
