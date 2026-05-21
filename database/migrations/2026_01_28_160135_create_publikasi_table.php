<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('publikasi', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('abstrak')->nullable();
            $table->string('penulis');
            $table->year('tahun');
            $table->enum('jenis', ['jurnal', 'konferensi', 'buku', 'lainnya'])->default('jurnal');
            $table->string('nama_jurnal')->nullable();
            $table->string('volume')->nullable();
            $table->string('halaman')->nullable();
            $table->string('doi')->nullable();
            $table->string('url')->nullable();
            $table->string('file')->nullable(); // PDF file
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('publikasi');
    }
};
