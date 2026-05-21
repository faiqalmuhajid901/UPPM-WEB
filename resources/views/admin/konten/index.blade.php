{{-- resources/views/admin/konten/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Kelola Konten')

@push('styles')
    {{-- CSS sudah di _admin.css --}}
@endpush

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Kelola Konten</h1>
            <p class="page-subtitle">Pilih section untuk mengelola konten</p>
        </div>
    </div>

    <!-- Stats Bar -->
    <div class="stats-bar">
        <div class="stat-item">
            <div class="stat-value">{{ collect($sections)->sum('count') }}</div>
            <div class="stat-label">Total Konten</div>
        </div>
        <div class="stat-item">
            <div class="stat-value">{{ count($sections) }}</div>
            <div class="stat-label">Section</div>
        </div>
        <div class="stat-item">
            <div class="stat-value">{{ collect($sections)->sum(fn($s) => count($s['categories'] ?? [])) }}</div>
            <div class="stat-label">Kategori</div>
        </div>
    </div>

    <!-- Section Cards -->
    <div class="section-cards">
        @foreach($sections as $key => $section)
        <a href="{{ route('admin.content.section', $section['slug'] ?? $key) }}" class="section-card {{ $section['color'] ?? 'blue' }}">
            <div class="card-header">
                <div class="card-icon {{ $section['color'] ?? 'blue' }}">
                    <i class="fas {{ $section['icon'] ?? 'fa-file' }}"></i>
                </div>
                <div class="card-count">{{ $section['count'] ?? 0 }}</div>
            </div>
            
            <h3 class="card-title">{{ $section['name'] ?? $key }}</h3>
            <p class="card-description">{{ $section['description'] ?? '' }}</p>
            
            <div class="card-tags">
                @foreach(($section['categories'] ?? []) as $catKey => $catConfig)
                    @php
                        // Handle both array and string format
                        $catName = is_array($catConfig) ? ($catConfig['name'] ?? $catKey) : $catConfig;
                    @endphp
                    <span class="card-tag">{{ $catName }}</span>
                @endforeach

                @php
                    $sectionSlug = $section['slug'] ?? $key;
                @endphp

                @if($sectionSlug === 'dokumen')
                    {{-- Tambahan label agar sesuai filter kategori di halaman Arsip Dokumen publik --}}
                    <span class="card-tag">SK &amp; Peraturan</span>
                    <span class="card-tag">Panduan</span>
                    <span class="card-tag">Template</span>
                    <span class="card-tag">Laporan</span>
                @endif
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
