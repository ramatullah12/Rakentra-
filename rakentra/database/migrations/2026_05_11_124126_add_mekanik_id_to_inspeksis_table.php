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
        Schema::table('inspeksis', function (Blueprint $table) {
            $table->foreignId('mekanik_id')->nullable()->after('operasional_id')->constrained('mekaniks')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inspeksis', function (Blueprint $table) {
            $table->dropForeign(['mekanik_id']);
            $table->dropColumn('mekanik_id');
        });
    }
};
