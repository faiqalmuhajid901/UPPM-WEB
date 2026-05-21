<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penelitian', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('penulis');
            $table->year('tahun');
            $table->enum('status', ['berlangsung', 'selesai'])->default('berlangsung');
            $table->string('gambar')->nullable();
            $table->string('file')->nullable(); // PDF file
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penelitian');
    }
};
