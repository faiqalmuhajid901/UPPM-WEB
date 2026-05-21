<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Publikasi extends Model
{
    use HasFactory;

    protected $table = 'publikasi';

    protected $fillable = [
        'judul',
        'abstrak',
        'penulis',
        'tahun',
        'jenis',
        'nama_jurnal',
        'volume',
        'halaman',
        'doi',
        'url',
        'file',
    ];

    protected $casts = [
        'tahun' => 'integer',
    ];

    /**
     * Scope berdasarkan jenis
     */
    public function scopeJenis($query, string $jenis)
    {
        return $query->where('jenis', $jenis);
    }

    /**
     * Get URL file
     */
    public function getFileUrlAttribute(): ?string
    {
        if (!$this->file) {
            return null;
        }

        $normalized = ltrim($this->file, '/');

        if (is_file(public_path('storage/' . $normalized))) {
            return asset('storage/' . $normalized);
        }

        if (Storage::disk('public')->exists($normalized)) {
            return route('media.public', ['path' => $normalized]);
        }

        return null;
    }

    /**
     * Get formatted citation
     */
    public function getCitationAttribute(): string
    {
        $citation = "{$this->penulis} ({$this->tahun}). {$this->judul}.";
        
        if ($this->nama_jurnal) {
            $citation .= " {$this->nama_jurnal}";
            if ($this->volume) $citation .= ", {$this->volume}";
            if ($this->halaman) $citation .= ", {$this->halaman}";
        }
        
        return $citation . ".";
    }
}
