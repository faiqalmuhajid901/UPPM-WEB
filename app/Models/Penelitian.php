<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Penelitian extends Model
{
    use HasFactory;

    protected $table = 'penelitian';

    protected $fillable = [
        'judul',
        'deskripsi',
        'penulis',
        'tahun',
        'status',
        'gambar',
        'file',
    ];

    protected $casts = [
        'tahun' => 'integer',
    ];

    /**
     * Scope untuk penelitian berlangsung
     */
    public function scopeBerlangsung($query)
    {
        return $query->where('status', 'berlangsung');
    }

    /**
     * Scope untuk penelitian selesai
     */
    public function scopeSelesai($query)
    {
        return $query->where('status', 'selesai');
    }

    /**
     * Get URL gambar
     */
    public function getGambarUrlAttribute(): ?string
    {
        return $this->resolveStorageUrl($this->gambar);
    }

    /**
     * Get URL file
     */
    public function getFileUrlAttribute(): ?string
    {
        return $this->resolveStorageUrl($this->file);
    }

    private function resolveStorageUrl(?string $path): ?string
    {
        if (!$path) {
            return null;
        }

        $normalized = ltrim($path, '/');

        if (is_file(public_path('storage/' . $normalized))) {
            return asset('storage/' . $normalized);
        }

        if (Storage::disk('public')->exists($normalized)) {
            return route('media.public', ['path' => $normalized]);
        }

        return null;
    }
}
