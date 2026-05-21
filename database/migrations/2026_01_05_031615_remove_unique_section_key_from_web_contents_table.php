<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('web_contents', function (Blueprint $table) {
            $table->dropUnique(['key']);
            $table->string('section')->nullable()->after('key');
            $table->unique(['section', 'key']);
        });
    }

    public function down(): void
    {
        Schema::table('web_contents', function (Blueprint $table) {
            $table->dropUnique(['section', 'key']);
            $table->dropColumn('section');
            $table->unique(['key']);
        });
    }
};
