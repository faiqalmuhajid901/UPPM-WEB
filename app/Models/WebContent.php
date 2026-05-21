<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'title',
        'content',
        'type',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Ambil konten berdasarkan key
     */
    public static function getContent(string $key): ?string
    {
        $content = self::where('key', $key)->where('is_active', true)->first();
        return $content?->content;
    }

    /**
     * Scope untuk konten aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
