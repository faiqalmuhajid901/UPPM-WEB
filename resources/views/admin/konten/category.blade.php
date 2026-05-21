@extends('layouts.admin')

@section('title', $categoryInfo['name'])
@section('page-title', $categoryInfo['name'])

@section('content')
<div class="category-management">
    
    {{-- Breadcrumb --}}
    <div class="breadcrumb-nav">
        <a href="{{ route('admin.content.index') }}">
            <i class="fas fa-folder-open"></i> Kelola Konten
        </a>
        <i class="fas fa-chevron-right"></i>
        <span>{{ $sectionInfo['name'] }}</span>
        <i class="fas fa-chevron-right"></i>
        <span class="current">{{ $categoryInfo['name'] }}</span>
    </div>

    {{-- Header --}}
    <div class="category-header">
        <div class="category-header-info">
            <h2>{{ $categoryInfo['name'] }}</h2>
            <p>Section: {{ $sectionInfo['name'] }} â€¢ Total {{ $contents->total() }} konten</p>
        </div>
        <a href="{{ route('admin.content.create', [$section, $category]) }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Tambah Konten
        </a>
    </div>

    {{-- Alerts --}}
    @if(session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
    </div>
    @endif

    {{-- Content Table --}}
    <div class="content-table-wrapper">
        @if($contents->count() > 0)
        <table class="content-table">
            <thead>
                <tr>
                    <th width="50">#</th>
                    <th>Judul</th>
                    <th width="120">Status</th>
                    <th width="150">Tanggal</th>
                    <th width="120">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contents as $index => $content)
                <tr>
                    <td class="text-center" data-label="No">{{ $contents->firstItem() + $index }}</td>
                    <td data-label="Judul">
                        <div class="content-title-cell">
                            @if($content->image)
                            <img src="{{ $content->image_url }}" alt="" class="content-thumb">
                            @else
                            <div class="content-thumb-placeholder">
                                <i class="fas fa-image"></i>
                            </div>
                            @endif
                            <div>
                                <p class="content-title">{{ $content->title }}</p>
                                @if($content->excerpt)
                                <p class="content-excerpt">{{ Str::limit($content->excerpt, 60) }}</p>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td data-label="Status">
                        @if($content->is_published)
                        <span class="badge badge-success">
                            <i class="fas fa-check"></i> Published
                        </span>
                        @else
                        <span class="badge badge-warning">
                            <i class="fas fa-eye-slash"></i> Draft
                        </span>
                        @endif
                    </td>
                    <td data-label="Tanggal">
                        <span class="text-muted">{{ $content->created_at->format('d M Y') }}</span>
                    </td>
                    <td data-label="Aksi">
                        <div class="action-buttons">
                            <a href="{{ route('admin.content.edit', $content->id) }}" 
                               class="btn-icon btn-edit" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.content.destroy', $content->id) }}" 
                                  method="POST" 
                                  data-confirm-message="Yakin ingin menghapus konten ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-icon btn-delete" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="pagination-wrapper">
            {{ $contents->links() }}
        </div>

        @else
        {{-- Empty State --}}
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-folder-open"></i>
            </div>
            <h3>Belum ada konten</h3>
            <p>Mulai tambahkan konten untuk kategori {{ $categoryInfo['name'] }}</p>
            <a href="{{ route('admin.content.create', [$section, $category]) }}" class="btn-primary">
                <i class="fas fa-plus"></i>
                Tambah Konten Pertama
            </a>
        </div>
        @endif
    </div>

</div>
@endsection

