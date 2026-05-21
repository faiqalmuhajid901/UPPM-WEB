@extends('layouts.app')

@section('title', __('ui.pengabdian_page_title'))

@push('styles')
@vite('resources/css/pengabdian.css')
@endpush

@section('content')

{{-- ========================================
     HERO SECTION
========================================= --}}
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
            <i class="fas fa-hands-helping"></i>
            <span>{{ __('ui.uppm_politeknik') }}</span>
        </div>
        <h1 class="hero-title">{{ $header->title ?? __('ui.pengabdian_page_title') }}</h1>
        <p class="hero-subtitle">
            {{ $header->excerpt ?? __('ui.pengabdian_default_desc') }}
        </p>
        <div class="hero-buttons">
            <a href="{{ route('pengabdian.panduan') }}" class="btn-hero-primary">
                <i class="fas fa-book-open"></i>
                {{ __('ui.lihat_panduan') }}
            </a>
            <a href="#kegiatan" class="btn-hero-secondary">
                <i class="fas fa-calendar-alt"></i>
                {{ __('ui.kegiatan_terbaru') }}
            </a>
        </div>
    </div>
    <div class="hero-scroll-indicator">
        <span>{{ __('ui.scroll') }}</span>
        <i class="fas fa-chevron-down"></i>
    </div>
</section>

{{-- ========================================
     STATISTIK SECTION
========================================= --}}
<section class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-card" data-aos="fade-up" data-aos-delay="0">
                <div class="stat-icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <div class="stat-number" data-count="{{ $stats['program'] ?? 15 }}">0</div>
                <div class="stat-label">{{ __('ui.program_aktif') }}</div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="stat-number" data-count="{{ $stats['pelatihan'] ?? 25 }}">0</div>
                <div class="stat-label">{{ __('ui.pelatihan') }}</div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="stat-number" data-count="{{ $stats['kegiatan'] ?? 50 }}">0</div>
                <div class="stat-label">{{ __('ui.kegiatan') }}</div>
            </div>
        </div>
    </div>
</section>

{{-- ========================================
     SKEMA PENGABDIAN SECTION
========================================= --}}
<section id="skema" class="skema-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-badge">{{ __('navbar.skema') }}</span>
            <h2 class="section-title">{{ __('ui.skema_pengabdian') }}</h2>
            <p class="section-subtitle">{{ __('ui.skema_pengabdian_desc') }}</p>
        </div>

        @if($skema->count() > 0)
            <div class="skema-grid">
                @foreach($skema as $index => $item)
                    <div class="skema-card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="skema-icon">
                            <i class="fas fa-{{ $item->icon ?? 'file-alt' }}"></i>
                        </div>
                        <h3 class="skema-title">{{ $item->title }}</h3>
                        <p class="skema-desc">{{ $item->excerpt ?? 'Deskripsi skema pengabdian akan ditampilkan di sini.' }}</p>
                        <a href="{{ $item->file_url ?? '#' }}" class="skema-link" target="_blank" rel="noopener noreferrer">
                            {{ __('ui.pelajari_lanjut') }} <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            {{-- Placeholder Cards --}}
            <div class="skema-grid">
                <div class="skema-card" data-aos="fade-up" data-aos-delay="0">
                    <div class="skema-icon"><i class="fas fa-users"></i></div>
                    <h3 class="skema-title">Pengabdian Reguler</h3>
                    <p class="skema-desc">Program pengabdian rutin yang dilaksanakan setiap semester untuk dosen dan mahasiswa.</p>
                    <a href="#" class="skema-link">{{ __('ui.pelajari_lanjut') }} <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="skema-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="skema-icon"><i class="fas fa-hands-helping"></i></div>
                    <h3 class="skema-title">Pengabdian Mandiri</h3>
                    <p class="skema-desc">Program pengabdian yang diinisiasi secara mandiri oleh dosen dengan pendanaan internal.</p>
                    <a href="#" class="skema-link">{{ __('ui.pelajari_lanjut') }} <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="skema-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="skema-icon"><i class="fas fa-building"></i></div>
                    <h3 class="skema-title">Kerjasama Industri</h3>
                    <p class="skema-desc">Program pengabdian yang bekerjasama dengan pihak industri dan mitra eksternal.</p>
                    <a href="#" class="skema-link">{{ __('ui.pelajari_lanjut') }} <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        @endif
    </div>
</section>

{{-- ========================================
     PROGRAM PENGABDIAN SECTION
========================================= --}}
<section id="program" class="program-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-badge">{{ __('ui.program_pengabdian') }}</span>
            <h2 class="section-title">{{ __('ui.program_pengabdian') }}</h2>
            <p class="section-subtitle">{{ __('ui.program_pengabdian_desc') }}</p>
        </div>

        @if($program->count() > 0)
            <div class="skema-grid section-card-grid">
                @foreach($program as $index => $item)
                    @php
                        $programDesc = Str::limit($item->excerpt ?: strip_tags($item->content ?? ''), 120);
                        $programLink = $item->file_url ?: '#';
                    @endphp
                    <div class="skema-card section-card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="skema-icon">
                            <i class="fas fa-{{ $item->icon ?? 'project-diagram' }}"></i>
                        </div>
                        <h3 class="skema-title">{{ $item->title }}</h3>
                        <p class="skema-desc">{{ $programDesc ?: 'Deskripsi program pengabdian akan ditampilkan di sini.' }}</p>
                        <a href="{{ $programLink }}" class="skema-link" @if($item->file_url) target="_blank" rel="noopener noreferrer" @endif>
                            {{ __('ui.pelajari_lanjut') }} <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            {{-- Placeholder Cards --}}
            <div class="skema-grid section-card-grid">
                <div class="skema-card section-card" data-aos="fade-up" data-aos-delay="0">
                    <div class="skema-icon">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h3 class="skema-title">Program Pemberdayaan UMKM</h3>
                    <p class="skema-desc">Pendampingan usaha kecil melalui pelatihan produksi, manajemen, dan pemasaran digital.</p>
                    <a href="#" class="skema-link">{{ __('ui.pelajari_lanjut') }} <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="skema-card section-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="skema-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3 class="skema-title">Program Teknologi Tepat Guna</h3>
                    <p class="skema-desc">Penerapan teknologi sederhana yang relevan untuk meningkatkan produktivitas masyarakat.</p>
                    <a href="#" class="skema-link">{{ __('ui.pelajari_lanjut') }} <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="skema-card section-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="skema-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="skema-title">Program Edukasi Komunitas</h3>
                    <p class="skema-desc">Kegiatan edukatif berbasis komunitas untuk mendorong peningkatan kapasitas masyarakat.</p>
                    <a href="#" class="skema-link">{{ __('ui.pelajari_lanjut') }} <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        @endif
    </div>
</section>

{{-- ========================================
     PELATIHAN SECTION
========================================= --}}
<section id="pelatihan" class="pelatihan-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-badge">{{ __('ui.pelatihan') }}</span>
            <h2 class="section-title">{{ __('ui.program_pelatihan') }}</h2>
            <p class="section-subtitle">{{ __('ui.program_pelatihan_desc') }}</p>
        </div>

        @if($pelatihan->count() > 0)
            <div class="skema-grid section-card-grid">
                @foreach($pelatihan->take(6) as $index => $item)
                    @php
                        $pelatihanDesc = Str::limit($item->excerpt ?: strip_tags($item->content ?? ''), 120);
                        $pelatihanLink = $item->file_url ?: route('pengabdian.pelatihan');
                    @endphp
                    <div class="skema-card section-card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="skema-icon">
                            <i class="fas fa-{{ $item->icon ?? 'graduation-cap' }}"></i>
                        </div>
                        <h3 class="skema-title">{{ $item->title }}</h3>
                        <p class="skema-desc">{{ $pelatihanDesc ?: 'Deskripsi pelatihan akan ditampilkan di sini.' }}</p>
                        <a href="{{ $pelatihanLink }}" class="skema-link" @if($item->file_url) target="_blank" rel="noopener noreferrer" @endif>
                            {{ __('ui.pelajari_lanjut') }} <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="skema-grid section-card-grid">
                <div class="skema-card section-card" data-aos="fade-up" data-aos-delay="0">
                    <div class="skema-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3 class="skema-title">Pelatihan IT & Digital</h3>
                    <p class="skema-desc">Pelatihan teknologi informasi untuk masyarakat dan pelaku usaha.</p>
                    <a href="#" class="skema-link">{{ __('ui.pelajari_lanjut') }} <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="skema-card section-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="skema-icon">
                        <i class="fas fa-store"></i>
                    </div>
                    <h3 class="skema-title">Pelatihan Kewirausahaan</h3>
                    <p class="skema-desc">Peningkatan kemampuan bisnis, branding, dan pemasaran untuk UMKM.</p>
                    <a href="#" class="skema-link">{{ __('ui.pelajari_lanjut') }} <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="skema-card section-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="skema-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h3 class="skema-title">Pelatihan Vokasi</h3>
                    <p class="skema-desc">Program vokasi berbasis praktik untuk keterampilan teknis yang siap pakai.</p>
                    <a href="#" class="skema-link">{{ __('ui.pelajari_lanjut') }} <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        @endif

        <div class="section-more" data-aos="fade-up">
            <a href="{{ route('pengabdian.pelatihan') }}" class="section-more-link">
                {{ __('ui.lihat_semua_pelatihan') }}
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

{{-- ========================================
     KEGIATAN TERBARU SECTION
========================================= --}}
<section id="kegiatan" class="kegiatan-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-badge">{{ __('ui.kegiatan') }}</span>
            <h2 class="section-title">{{ __('ui.kegiatan_terbaru_section') }}</h2>
            <p class="section-subtitle">{{ __('ui.kegiatan_terbaru_desc') }}</p>
        </div>

        @if($kegiatan->count() > 0)
            <div class="skema-grid section-card-grid">
                @foreach($kegiatan->take(6) as $index => $item)
                    @php
                        $kegiatanDesc = Str::limit($item->excerpt ?: strip_tags($item->content ?? ''), 120);
                        $kegiatanLink = $item->file_url ?: '#';
                    @endphp
                    <div class="skema-card section-card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="skema-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h3 class="skema-title">{{ $item->title }}</h3>
                        <p class="section-meta">{{ $item->created_at->format('d M Y') }}</p>
                        <p class="skema-desc">{{ $kegiatanDesc ?: 'Deskripsi kegiatan pengabdian akan ditampilkan di sini.' }}</p>
                        <a href="{{ $kegiatanLink }}" class="skema-link" @if($item->file_url) target="_blank" rel="noopener noreferrer" @endif>
                            {{ __('ui.lihat_dokumentasi') }} <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            {{-- Placeholder --}}
            <div class="skema-grid section-card-grid">
                @for($i = 1; $i <= 3; $i++)
                    <div class="skema-card section-card" data-aos="fade-up" data-aos-delay="{{ ($i - 1) * 100 }}">
                        <div class="skema-icon">
                            <i class="fas fa-camera"></i>
                        </div>
                        <h3 class="skema-title">Kegiatan Pengabdian {{ $i }}</h3>
                        <p class="section-meta">{{ str_pad($i * 5, 2, '0', STR_PAD_LEFT) }} Feb 2026</p>
                        <p class="skema-desc">Dokumentasi kegiatan pengabdian masyarakat yang telah dilaksanakan bersama mitra.</p>
                        <a href="#" class="skema-link">{{ __('ui.lihat_dokumentasi') }} <i class="fas fa-arrow-right"></i></a>
                    </div>
                @endfor
            </div>
        @endif

        <div class="kegiatan-more" data-aos="fade-up">
            <a href="{{ route('pengabdian') }}#kegiatan" class="section-more-link">
                {{ __('ui.lihat_semua_kegiatan') }}
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
@vite('resources/js/pages/pengabdian.js')
@endpush


