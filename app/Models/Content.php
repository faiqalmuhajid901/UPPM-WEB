<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'file',
        'meta',
        'icon',
        'section',
        'category',
        'is_published',
        'order',
        'user_id',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'order' => 'integer',
        'meta' => 'array',
    ];

    protected $appends = [
        'image_url',
        'file_url',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeSection($query, string $section)
    {
        return $query->where('section', $section);
    }

    public function scopeCategory($query, string $category)
    {
        return $query->where('category', $category);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('created_at', 'desc');
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->resolveStorageUrl($this->image, 'image');
    }

    public function getFileUrlAttribute(): ?string
    {
        return $this->resolveStorageUrl($this->file, 'file');
    }

    public function hasImage(): bool
    {
        return $this->storageFileExists($this->image);
    }

    public function hasFile(): bool
    {
        return $this->storageFileExists($this->file);
    }

    private function resolveStorageUrl(?string $path, string $type): ?string
    {
        if (!$path) {
            return null;
        }

        if (preg_match('/^https?:\\/\\//i', $path)) {
            return $path;
        }

        $normalized = ltrim($path, '/');
        $publicPath = public_path('storage/' . $normalized);

        // Prioritize static file when available in public/storage.
        if (is_file($publicPath)) {
            return asset('storage/' . $normalized);
        }

        // Fallback: serve directly from storage disk through Laravel route.
        if (Storage::disk('public')->exists($normalized)) {
            return route('media.public', ['path' => $normalized]);
        }

        Log::warning(ucfirst($type) . ' file not found', [
            'content_id' => $this->id,
            'path' => $normalized,
        ]);

        return null;
    }

    private function storageFileExists(?string $path): bool
    {
        if (!$path) {
            return false;
        }

        $normalized = ltrim($path, '/');

        return is_file(public_path('storage/' . $normalized))
            || Storage::disk('public')->exists($normalized);
    }
}
