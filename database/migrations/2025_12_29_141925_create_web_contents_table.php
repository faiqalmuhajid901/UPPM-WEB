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
        Schema::create('web_contents', function (Blueprint $table) {
        $table->id();
        // 'section_key' unik untuk setiap bagian web (misal: 'home_hero', 'profil_kampus', 'news')
        $table->string('section_key')->unique(); 
        $table->string('title')->nullable();
        $table->text('description')->nullable(); // Isi teks
        $table->string('image')->nullable(); // Path gambar
        $table->json('additional_data')->nullable(); // Untuk data fleksibel lainnya
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_contents');
    }
};
