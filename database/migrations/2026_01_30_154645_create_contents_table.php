<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content');
            $table->string('image')->nullable();
            $table->string('file')->nullable(); // untuk PDF, dokumen
            $table->string('section'); // profile, penelitian, pengabdian, publikasi, kkn
            $table->string('category'); // profil-kampus, visi-misi, dll
            $table->boolean('is_published')->default(true);
            $table->integer('order')->default(0);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            
            $table->index(['section', 'category']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
