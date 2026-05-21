@extends('layouts.admin')

@section('title', 'Tambah Konten')
@section('page-title', 'Tambah Konten')

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
        <span class="current">Tambah Konten</span>
    </div>

    {{-- Form Card --}}
    <div class="form-card">
        <div class="form-card-header">
            <h2><i class="fas fa-plus-circle"></i> Tambah Konten Baru</h2>
            <p>Kategori: <strong>{{ $categoryInfo['name'] }}</strong></p>
        </div>

        <form action="{{ route('admin.content.store', [$section, $category]) }}" 
              method="POST" 
              enctype="multipart/form-data"
              class="form-card-body">
            @csrf

            {{-- Title --}}
            <div class="form-group">
                <label for="title">Judul <span class="required">*</span></label>
                <input type="text" 
                       name="title" 
                       id="title" 
                       value="{{ old('title') }}"
                       class="form-control @error('title') is-invalid @enderror" 
                       placeholder="Masukkan judul konten"
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
                          class="form-control @error('excerpt') is-invalid @enderror" 
                          placeholder="Ringkasan singkat (opsional)">{{ old('excerpt') }}</textarea>
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
                          placeholder="Tulis konten lengkap di sini..."
                          required>{{ old('content') }}</textarea>
                @error('content')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            {{-- Image & File Upload --}}
            <div class="form-row">
                <div class="form-group">
                    <label for="image">Gambar</label>
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
                    <label for="file">File Dokumen</label>
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
                           value="{{ old('order', 0) }}"
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
                               {{ old('is_published', true) ? 'checked' : '' }}>
                        <label for="is_published">Publish langsung</label>
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
                    Simpan Konten
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
