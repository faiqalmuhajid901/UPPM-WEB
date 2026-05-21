<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CleanUploads extends Command
{
    protected $signature = 'uploads:clean {folder?}';
    protected $description = 'Membersihkan folder uploads';

    public function handle()
    {
        $folder = $this->argument('folder') ?? 'uploads';
        $path = public_path($folder);

        if (!File::isDirectory($path)) {
            $this->error("Folder tidak ditemukan: {$path}");
            return 1;
        }

        // Hitung file sebelum dihapus
        $files = File::allFiles($path);
        $count = count($files);

        if ($count === 0) {
            $this->info("Folder sudah kosong.");
            return 0;
        }

        // Konfirmasi
        if (!$this->confirm("Hapus {$count} file di {$path}?")) {
            $this->info("Dibatalkan.");
            return 0;
        }

        // Hapus semua file
        File::cleanDirectory($path);
        
        $this->info("✅ Berhasil menghapus {$count} file!");
        return 0;
    }
}
