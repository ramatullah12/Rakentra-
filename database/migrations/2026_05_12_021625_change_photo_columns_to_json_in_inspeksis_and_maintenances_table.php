<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // For existing records, convert the string URL to a JSON array string
        // We do this by manually updating the records because 'change()' might fail if validation is active
        
        $inspeksis = DB::table('inspeksis')->get();
        foreach ($inspeksis as $inspeksi) {
            if ($inspeksi->foto_kerusakan && !str_starts_with($inspeksi->foto_kerusakan, '[')) {
                DB::table('inspeksis')->where('id', $inspeksi->id)->update([
                    'foto_kerusakan' => json_encode([$inspeksi->foto_kerusakan])
                ]);
            }
        }

        $maintenances = DB::table('maintenances')->get();
        foreach ($maintenances as $maintenance) {
            if ($maintenance->foto_perbaikan && !str_starts_with($maintenance->foto_perbaikan, '[')) {
                DB::table('maintenances')->where('id', $maintenance->id)->update([
                    'foto_perbaikan' => json_encode([$maintenance->foto_perbaikan])
                ]);
            }
        }

        Schema::table('inspeksis', function (Blueprint $table) {
            $table->json('foto_kerusakan')->nullable()->change();
        });

        Schema::table('maintenances', function (Blueprint $table) {
            $table->json('foto_perbaikan')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inspeksis', function (Blueprint $table) {
            $table->string('foto_kerusakan')->nullable()->change();
        });

        Schema::table('maintenances', function (Blueprint $table) {
            $table->string('foto_perbaikan')->nullable()->change();
        });
    }
};
