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
        Schema::table('web_contents', function (Blueprint $table) {
            // Hapus aturan unique pada kolom section_key
            $table->dropUnique(['section_key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('web_contents', function (Blueprint $table) {
            // Kembalikan seperti semula jika perlu di rollback
            $table->unique('section_key');
        });
    }
};
