@extends('layouts.admin')

@section('title', 'Edit Konten')
@section('page-title', 'Edit Konten')

@section('content')
<div class="form-page">
    
    {{-- Breadcrumb --}}
    <div class="breadcrumb-nav">
        <a href="{{ route('admin.content.index') }}">
            <i class="fas fa-folder-open"></i> Kelola Konten
        </a>
        <i class="fas fa-chevron-right"></i>
        <a href="{{ route('admin.content.category', [$section, $category]) }}">
            {{ $categoryInfo['name'] }}
        </a>
        <i class="fas fa-chevron-right"></i>
        <span class="current">Edit Konten</span>
    </div>

    {{-- Form Card --}}
    <div class="form-card">
        <div class="form-card-header">
            <h2><i class="fas fa-edit"></i> Edit Konten</h2>
            <p>Kategori: <strong>{{ $categoryInfo['name'] }}</strong></p>
        </div>

        <form action="{{ route('admin.content.update', $content->id) }}" 
              method="POST" 
              enctype="multipart/form-data"
              class="form-card-body">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div class="form-group">
                <label for="title">Judul <span class="required">*</span></label>
                <input type="text" 
                       name="title" 
                       id="title" 
                       value="{{ old('title', $content->title) }}"
                       class="form-control @error('title') is-invalid @enderror" 
                       required>
                @error('title')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            {{-- Excerpt --}}
            <div class="form-group">
                <label for="excerpt">Ringkasan</label>
                <textarea name="excerpt" 
                          id="excerpt" 
                          rows="2"
                          class="form-control @error('excerpt') is-invalid @enderror">{{ old('excerpt', $content->excerpt) }}</textarea>
                @error('excerpt')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            {{-- Content --}}
            <div class="form-group">
                <label for="content">Konten <span class="required">*</span></label>
                <textarea name="content" 
                          id="content" 
                          rows="10"
                          class="form-control @error('content') is-invalid @enderror" 
                          required>{{ old('content', $content->content) }}</textarea>
                @error('content')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            {{-- Current Image Preview --}}
            @if($content->image)
            <div class="form-group">
                <label>Gambar Saat Ini</label>
                <div class="current-file">
                    <img src="{{ $content->image_url }}" alt="" class="preview-image">
                    <span>{{ basename($content->image) }}</span>
                </div>
            </div>
            @endif

            {{-- Image & File Upload --}}
            <div class="form-row">
                <div class="form-group">
                    <label for="image">{{ $content->image ? 'Ganti Gambar' : 'Upload Gambar' }}</label>
                    <div class="file-upload">
                        <input type="file" name="image" id="image" accept="image/*">
                        <div class="file-upload-label">
                            <i class="fas fa-image"></i>
                            <span>Pilih Gambar</span>
                            <small>JPG, PNG, GIF, WEBP (max 2MB)</small>
                        </div>
                    </div>
                    @error('image')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="file">{{ $content->file ? 'Ganti Dokumen' : 'Upload Dokumen' }}</label>
                    @if($content->file)
                    <div class="current-file">
                        <i class="fas fa-file-pdf"></i>
                        <span>{{ basename($content->file) }}</span>
                    </div>
                    @endif
                    <div class="file-upload">
                        <input type="file" name="file" id="file" accept=".pdf,.doc,.docx,.xls,.xlsx">
                        <div class="file-upload-label">
                            <i class="fas fa-file-pdf"></i>
                            <span>Pilih Dokumen</span>
                            <small>PDF, DOC, XLS (max 10MB)</small>
                        </div>
                    </div>
                    @error('file')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {{-- Options --}}
            <div class="form-row">
                <div class="form-group">
                    <label for="order">Urutan</label>
                    <input type="number" 
                           name="order" 
                           id="order" 
                           value="{{ old('order', $content->order) }}"
                           class="form-control" 
                           min="0">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <div class="form-switch">
                        <input type="hidden" name="is_published" value="0">
                        <input type="checkbox" 
                               name="is_published" 
                               id="is_published" 
                               value="1"
                               {{ old('is_published', $content->is_published) ? 'checked' : '' }}>
                        <label for="is_published">Publish</label>
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="form-actions">
                <a href="{{ route('admin.content.category', [$section, $category]) }}" class="btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save"></i>
                    Update Konten
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
