<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Team extends Model
{
    use HasFactory;

    protected $table = 'team';

    protected $fillable = [
        'nama',
        'jabatan',
        'kategori',
        'bio',
        'email',
        'telepon',
        'foto',
        'linkedin',
        'google_scholar',
        'urutan',
        'is_active',
    ];

    protected $casts = [
        'urutan' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Scope untuk anggota aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope berdasarkan kategori
     */
    public function scopeKategori($query, string $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    /**
     * Get URL foto
     */
    public function getFotoUrlAttribute(): string
    {
        if (!$this->foto) {
            return asset('images/default-avatar.png');
        }

        $normalized = ltrim($this->foto, '/');

        if (is_file(public_path('storage/' . $normalized))) {
            return asset('storage/' . $normalized);
        }

        if (Storage::disk('public')->exists($normalized)) {
            return route('media.public', ['path' => $normalized]);
        }

        return asset('images/default-avatar.png');
    }
}
