{{-- resources/views/admin/konten/section.blade.php --}}
@extends('layouts.admin')

@section('title', 'Kelola ' . ($sectionConfig['name'] ?? $section))

@section('content')
<div class="content-section-page">
    <!-- Breadcrumb -->
    <nav class="breadcrumb">
        <a href="{{ route('admin.dashboard') }}">
            <i class="fas fa-home"></i>
        </a>
        <span>/</span>
        <a href="{{ route('admin.content.index') }}">Konten</a>
        <span>/</span>
        <span class="current">{{ $sectionConfig['name'] ?? $section }}</span>
    </nav>

    <!-- Section Header -->
    <div class="section-header">
        <div class="section-info">
            <div class="section-icon {{ $sectionConfig['color'] ?? 'blue' }}">
                <i class="fas {{ $sectionConfig['icon'] ?? 'fa-file' }}"></i>
            </div>
            <div>
                <h1 class="section-title">{{ $sectionConfig['name'] ?? $section }}</h1>
                <p class="section-subtitle">{{ $sectionConfig['description'] ?? '' }}</p>
            </div>
        </div>
        <button type="button" id="btn-tambah" class="btn-tambah">
            <i class="fas fa-plus"></i>
            Tambah Konten
        </button>
    </div>

    <!-- Category Tabs -->
    <div class="category-tabs">
        <button type="button" class="category-tab active" data-category="all">
            Semua <span class="count">({{ $contents->count() }})</span>
        </button>
        @foreach(($sectionConfig['categories'] ?? []) as $catKey => $catConfig)
            @php
                $catName = is_array($catConfig) ? ($catConfig['name'] ?? $catKey) : $catConfig;
                $catCount = $contents->where('category', $catKey)->count();
            @endphp
            <button type="button" class="category-tab" data-category="{{ $catKey }}">
                {{ $catName }} <span class="count">({{ $catCount }})</span>
            </button>
        @endforeach
    </div>

    <!-- Content Area -->
    <div class="content-area">
        <div class="content-header">
            <div>
                <span class="content-title">Daftar Konten</span>
                <span class="content-count" id="content-count">({{ $contents->count() }} item)</span>
            </div>
            <div class="content-actions">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="search-input" placeholder="Cari konten...">
                </div>
            </div>
        </div>

        <div class="content-body">
            @if($contents->isEmpty())
                @include('admin.konten.partials.empty')
            @else
                @include('admin.konten.partials.table', ['contents' => $contents])
            @endif
        </div>
    </div>
</div>

<!-- Modal Form - DI LUAR content-section-page -->
@include('admin.konten.partials.modal-form', ['sectionConfig' => $sectionConfig])

<!-- Modal Delete - DI LUAR content-section-page -->
@include('admin.konten.partials.modal-delete')

@php
    $categoriesData = [];
    foreach (($sectionConfig['categories'] ?? []) as $catKey => $catConfig) {
        if (is_array($catConfig)) {
            $categoriesData[] = [
                'key' => $catKey,
                'name' => $catConfig['name'] ?? $catKey,
                'has_image' => $catConfig['has_image'] ?? true,
                'has_file' => $catConfig['has_file'] ?? true,
                'has_icon' => $catConfig['has_icon'] ?? false,
                'subcategories' => $catConfig['subcategories'] ?? null,
            ];
        } else {
            $categoriesData[] = [
                'key' => $catKey,
                'name' => $catConfig,
                'has_image' => true,
                'has_file' => true,
                'has_icon' => false,
                'subcategories' => null,
            ];
        }
    }
@endphp

<div
    id="section-data"
    hidden
    data-section="{{ $section }}"
    data-categories='@json($categoriesData)'
    data-csrf-token="{{ csrf_token() }}"
    data-admin-content-base-url="{{ url('admin/content') }}"
    data-storage-base-url="{{ asset('storage') }}"
></div>

@endsection

@push('styles')
    @vite('resources/css/modules/section-modal.css')
@endpush

@push('scripts')
    @vite('resources/js/admin/section-config.js')
    @vite('resources/js/admin/content-section.js')
@endpush


