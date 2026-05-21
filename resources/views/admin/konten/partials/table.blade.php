{{-- resources/views/admin/konten/partials/table.blade.php --}}
<table class="content-table">
    <thead>
        <tr>
            <th>KONTEN</th>
            <th>KATEGORI</th>
            <th>STATUS</th>
            <th>TANGGAL</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody id="content-tbody">
        @foreach($contents as $content)
        <tr data-id="{{ $content->id }}" data-category="{{ $content->category }}">
            <td data-label="Konten">
                <div class="content-info">
                    @if($content->image)
                        <img src="{{ $content->image_url }}" 
                             alt="{{ $content->title }}" 
                             class="content-thumb">
                    @else
                        <div class="content-thumb-placeholder">
                            <i class="fas fa-image"></i>
                        </div>
                    @endif
                    <div class="content-details">
                        <h4 class="content-title-cell">{{ $content->title }}</h4>
                        @if($content->excerpt)
                            <p>{{ Str::limit($content->excerpt, 50) }}</p>
                        @endif
                    </div>
                </div>
            </td>
            <td data-label="Kategori">
                @php
                    $categoryName = $content->category;
                    if (isset($sectionConfig['categories'][$content->category])) {
                        $catConfig = $sectionConfig['categories'][$content->category];
                        $categoryName = is_array($catConfig) ? ($catConfig['name'] ?? $content->category) : $catConfig;
                    }
                @endphp
                <span class="badge badge-category">{{ $categoryName }}</span>
            </td>
            <td data-label="Status">
                @if($content->is_published)
                    <span class="badge badge-published">
                        <i class="fas fa-check-circle"></i> Published
                    </span>
                @else
                    <span class="badge badge-draft">
                        <i class="fas fa-clock"></i> Draft
                    </span>
                @endif
            </td>
            <td data-label="Tanggal">{{ $content->created_at->format('d M Y') }}</td>
            <td data-label="Aksi">
                <div class="action-buttons">
                    {{-- PENTING: Gunakan class dan data attributes yang benar --}}
                    <button type="button" 
                            class="btn-action btn-edit" 
                            data-id="{{ $content->id }}"
                            data-title="{{ $content->title }}"
                            title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" 
                            class="btn-action btn-delete" 
                            data-id="{{ $content->id }}"
                            data-title="{{ $content->title }}"
                            title="Hapus">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
