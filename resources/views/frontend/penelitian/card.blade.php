{{-- Card Component untuk Penelitian --}}
@php
    $description = $item->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($item->content ?? ''), 120);
    $publishedDate = optional($item->created_at)->format('d M Y');
    $fileUrl = $item->file_url ?? null;
@endphp

<article class="research-card {{ $type }}" data-category="{{ $type }}" data-animation-delay="{{ $index * 100 }}">
    <div class="card-image-wrapper">
        @if($item->image)
            <img
                src="{{ $item->image_url }}"
                alt="{{ $item->title }}"
                class="card-image"
                loading="lazy"
            >
        @else
            <div class="card-image-placeholder {{ $type }}">
                <i class="fas fa-file-alt text-4xl"></i>
            </div>
        @endif

        <div class="card-overlay"></div>
        <span class="card-badge {{ $type }}">{{ ucfirst($type) }}</span>

        @if($fileUrl)
            <div class="card-actions">
                <a
                    href="{{ $fileUrl }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="action-btn download"
                    title="Unduh Dokumen"
                >
                    <i class="fas fa-download"></i>
                </a>
            </div>
        @endif
    </div>

    <div class="card-content">
        <h3 class="card-title">{{ $item->title }}</h3>
        @if($description)
            <p class="card-description">{{ $description }}</p>
        @endif

        <div class="card-meta">
            @if($publishedDate)
                <div class="meta-item">
                    <i class="fas fa-calendar-alt"></i>
                    <span>{{ $publishedDate }}</span>
                </div>
            @endif
            @if($fileUrl)
                <div class="meta-item">
                    <i class="fas fa-file-download"></i>
                    <span>Dokumen tersedia</span>
                </div>
            @endif
        </div>

        @if($fileUrl)
            <div class="card-footer">
                <a href="{{ $fileUrl }}" target="_blank" rel="noopener noreferrer" class="card-link {{ $type }}">
                    <span>Unduh Dokumen</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        @endif
    </div>
</article>
