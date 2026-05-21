    {{-- FILE: resources/views/frontend/pengabdian/panduan.blade.php --}}
@extends('layouts.frontend')

@section('title', __('ui.panduan_pengabdian_title'))

@push('styles')
@vite('resources/css/pengabdian.css')
@endpush

@section('content')
<div class="panduan-page">
    
    {{-- Hero Section - Same style as main pengabdian page --}}
    <section class="pengabdian-hero @if($header && $header->image_url) has-dynamic-bg @endif" @if($header && $header->image_url) data-bg-image="{{ $header->image_url }}" @endif>
        @if($header && $header->image_url)
        <div class="hero-overlay hero-overlay--dark"></div>
        @else
        <div class="hero-overlay"></div>
        @endif
        @unless($header && $header->image_url)
        <div class="hero-pattern"></div>
        @endunless
        <div class="hero-content">
            <div class="hero-badge">
                <i class="fas fa-book-open"></i>
                <span>{{ __('ui.panduan_pengabdian_badge') }}</span>
            </div>
            <div class="hero-buttons">
                <a href="#dokumen" class="btn-hero-primary">
                    <i class="fas fa-file-alt"></i>
                    {{ __('ui.lihat_dokumen') }}
                </a>
                <a href="{{ route('kontak') }}" class="btn-hero-secondary">
                    <i class="fas fa-envelope"></i>
                    {{ __('ui.contact_us') }}
                </a>
            </div>
        </div>
        <div class="hero-scroll-indicator">
            <span>{{ __('ui.scroll') }}</span>
            <i class="fas fa-chevron-down"></i>
        </div>
    </section>

    {{-- Main Content --}}
    <section class="section-content">
        <div class="container">


            {{-- Panduan List --}}
            <div id="dokumen" class="panduan-section">
                <div class="section-header section-header--left">
                    <span class="section-badge">{{ __('navbar.dokumen') }}</span>
                    <h3 class="section-title">{{ __('ui.dokumen_panduan') }}</h3>
                </div>
                
                <div class="panduan-grid">
                    @forelse($panduan ?? [] as $item)
                        <div class="panduan-card">
                            <div class="panduan-card__icon">
                                <i class="fas fa-{{ $item->icon ?? 'file-pdf' }}"></i>
                            </div>
                            <div class="panduan-card__content">
                                <h4 class="panduan-card__title">{{ $item->title }}</h4>
                                <p class="panduan-card__desc">{{ $item->excerpt ?? 'Deskripsi dokumen akan ditampilkan di sini.' }}</p>
                                <a href="{{ $item->file_url ?? '#' }}" class="panduan-card__link" target="_blank" rel="noopener noreferrer">
                                    <i class="fas fa-download"></i> Download
                                </a>
                            </div>
                        </div>
                    @empty
                        {{-- Placeholder Cards --}}
                        <div class="panduan-card">
                            <div class="panduan-card__icon">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            <div class="panduan-card__content">
                                <h4 class="panduan-card__title">Panduan Umum Pengabdian</h4>
                                <p class="panduan-card__desc">Panduan lengkap tentang pelaksanaan pengabdian masyarakat di UPPM.</p>
                                <a href="#" class="panduan-card__link">
                                    <i class="fas fa-download"></i> Download
                                </a>
                            </div>
                        </div>
                        <div class="panduan-card">
                            <div class="panduan-card__icon">
                                <i class="fas fa-file-word"></i>
                            </div>
                            <div class="panduan-card__content">
                                <h4 class="panduan-card__title">Format Proposal Pengabdian</h4>
                                <p class="panduan-card__desc">Template dan format penulisan proposal pengabdian masyarakat.</p>
                                <a href="#" class="panduan-card__link">
                                    <i class="fas fa-download"></i> Download
                                </a>
                            </div>
                        </div>
                        <div class="panduan-card">
                            <div class="panduan-card__icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="panduan-card__content">
                                <h4 class="panduan-card__title">Pedoman Pelaksanaan</h4>
                                <p class="panduan-card__desc">Pedoman teknis pelaksanaan kegiatan pengabdian masyarakat.</p>
                                <a href="#" class="panduan-card__link">
                                    <i class="fas fa-download"></i> Download
                                </a>
                            </div>
                        </div>
                        <div class="panduan-card">
                            <div class="panduan-card__icon">
                                <i class="fas fa-file-invoice"></i>
                            </div>
                            <div class="panduan-card__content">
                                <h4 class="panduan-card__title">Laporan Akhir</h4>
                                <p class="panduan-card__desc">Format dan pedoman penyusunan laporan akhir pengabdian.</p>
                                <a href="#" class="panduan-card__link">
                                    <i class="fas fa-download"></i> Download
                                </a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- Alur Pengabdian --}}
            <div class="alur-section">
                <div class="section-header section-header--left">
                    <span class="section-badge">{{ __('ui.alur_prosedur') }}</span>
                    <h3 class="section-title">{{ __('ui.alur_pengabdian') }}</h3>
                </div>

                
                <div class="alur-timeline">
                    <div class="alur-step">
                        <div class="alur-step__number">1</div>
                        <div class="alur-step__content">
                            <h4>Pengajuan Proposal</h4>
                            <p>Mengajukan proposal pengabdian sesuai format yang telah ditentukan</p>
                        </div>
                    </div>
                    
                    <div class="alur-step">
                        <div class="alur-step__number">2</div>
                        <div class="alur-step__content">
                            <h4>Review & Evaluasi</h4>
                            <p>Proposal direview oleh tim UPPM untuk evaluasi kelayakan</p>
                        </div>
                    </div>
                    
                    <div class="alur-step">
                        <div class="alur-step__number">3</div>
                        <div class="alur-step__content">
                            <h4>Pelaksanaan</h4>
                            <p>Kegiatan pengabdian dilaksanakan sesuai rencana yang disetujui</p>
                        </div>
                    </div>
                    
                    <div class="alur-step">
                        <div class="alur-step__number">4</div>
                        <div class="alur-step__content">
                            <h4>Pelaporan</h4>
                            <p>Penyusunan dan pengumpulan laporan akhir kegiatan</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>
@endsection

