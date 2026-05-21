{{-- FILE: resources/views/frontend/pengabdian/pelayanan.blade.php --}}
@extends('layouts.frontend')

@section('title', __('ui.pelayanan_page_title'))

@push('styles')
@vite('resources/css/pengabdian.css')
@endpush

@section('content')
<div class="pelayanan-page">
    
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
                <i class="fas fa-headset"></i>
                <span>{{ __('ui.layanan_konsultasi') }}</span>
            </div>
            <h1 class="hero-title">{{ $header->title ?? __('ui.layanan_konsultasi') }}</h1>
            <p class="hero-subtitle">
                {{ $header->excerpt ?? __('ui.layanan_konsultasi_desc') }}
            </p>
            <div class="hero-buttons">
                <a href="#layanan" class="btn-hero-primary">
                    <i class="fas fa-list"></i>
                    {{ __('ui.lihat_layanan') }}
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
            
            {{-- Introduction --}}
            <div class="content-intro">
                <div class="content-intro__icon">
                    <i class="fas fa-headset"></i>
                </div>
                <div class="content-intro__text">
                    <h2>{{ __('ui.tentang_layanan') }}</h2>
                    <p>{{ $header->content ?? 'UPPM Politeknik ATK Yogyakarta menyediakan berbagai layanan konsultasi dan pendampingan teknis untuk membantu industri dan UMKM dalam pengembangan produk, peningkatan kualitas, dan pemecahan masalah teknis di bidang kulit, karet, dan plastik.' }}</p>
                </div>
            </div>

            {{-- Jenis Layanan --}}
            <div id="layanan" class="layanan-section">
                <div class="section-header text-center">
                    <span class="section-badge">{{ __('ui.jenis_layanan') }}</span>
                    <h3 class="section-title text-center">{{ __('ui.jenis_layanan') }}</h3>
                    <p class="section-subtitle text-center">{{ __('ui.berbagai_layanan') }}</p>
                </div>
                <div class="layanan-grid">
                    @forelse($layanans ?? [] as $layanan)
                        <div class="layanan-card">
                            @if($layanan->image)
                                <div class="layanan-card__image">
                                    <img src="{{ $layanan->image_url ?? Storage::url($layanan->image) }}" alt="{{ $layanan->title }}">
                                </div>
                            @endif
                            <div class="layanan-card__icon">
                                <i class="fas fa-{{ $layanan->icon ?? 'hands-helping' }}"></i>
                            </div>
                            <div class="layanan-card__content">
                                <h4 class="layanan-card__title">{{ $layanan->title }}</h4>
                                <p class="layanan-card__desc">{{ $layanan->description ?? 'Deskripsi layanan akan ditampilkan di sini.' }}</p>
                                <a href="#" class="layanan-card__link">{{ __('ui.pelajari_lanjut') }} <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    @empty
                        {{-- Placeholder Cards --}}
                        <div class="layanan-card">
                            <div class="layanan-card__icon">
                                <i class="fas fa-flask"></i>
                            </div>
                            <div class="layanan-card__content">
                                <h4 class="layanan-card__title">{{ __('ui.konsultasi_teknis') }}</h4>
                                <p class="layanan-card__desc">{{ __('ui.konsultasi_teknis_desc') }}</p>
                                <a href="#" class="layanan-card__link">Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="layanan-card">
                            <div class="layanan-card__icon">
                                <i class="fas fa-vial"></i>
                            </div>
                            <div class="layanan-card__content">
                                <h4 class="layanan-card__title">{{ __('ui.pengujian_lab') }}</h4>
                                <p class="layanan-card__desc">{{ __('ui.pengujian_lab_desc') }}</p>
                                <a href="#" class="layanan-card__link">Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="layanan-card">
                            <div class="layanan-card__icon">
                                <i class="fas fa-hand-holding-usd"></i>
                            </div>
                            <div class="layanan-card__content">
                                <h4 class="layanan-card__title">{{ __('ui.pendampingan_umkm') }}</h4>
                                <p class="layanan-card__desc">{{ __('ui.pendampingan_umkm_desc') }}</p>
                                <a href="#" class="layanan-card__link">Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="layanan-card">
                            <div class="layanan-card__icon">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <div class="layanan-card__content">
                                <h4 class="layanan-card__title">{{ __('ui.pengembangan_produk') }}</h4>
                                <p class="layanan-card__desc">{{ __('ui.pengembangan_produk_desc') }}</p>
                                <a href="#" class="layanan-card__link">Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- Prosedur Layanan --}}
            <div class="prosedur-section">
                <div class="section-header text-center">
                    <span class="section-badge">{{ __('ui.prosedur_layanan') }}</span>
                    <h3 class="section-title text-center">{{ __('ui.prosedur_layanan') }}</h3>
                    <p class="section-subtitle text-center">{{ __('ui.tahapan_mengajukan') }}</p>
                </div>
                <div class="prosedur-steps">
                    <div class="prosedur-step">
                        <div class="prosedur-step__number">1</div>
                        <div class="prosedur-step__content">
                            <h4>{{ __('ui.konsultasi_awal') }}</h4>
                            <p>{{ __('ui.konsultasi_awal_desc') }}</p>
                        </div>
                    </div>
                    <div class="prosedur-step">
                        <div class="prosedur-step__number">2</div>
                        <div class="prosedur-step__content">
                            <h4>{{ __('ui.penjadwalan') }}</h4>
                            <p>{{ __('ui.penjadwalan_desc') }}</p>
                        </div>
                    </div>
                    <div class="prosedur-step">
                        <div class="prosedur-step__number">3</div>
                        <div class="prosedur-step__content">
                            <h4>{{ __('ui.pelaksanaan') }}</h4>
                            <p>{{ __('ui.pelaksanaan_desc') }}</p>
                        </div>
                    </div>
                    <div class="prosedur-step">
                        <div class="prosedur-step__number">4</div>
                        <div class="prosedur-step__content">
                            <h4>{{ __('ui.laporan_tindak_lanjut') }}</h4>
                            <p>{{ __('ui.laporan_tindak_lanjut_desc') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tarif Layanan --}}
            <div class="tarif-section">
                <div class="section-header text-center">
                    <span class="section-badge">{{ __('ui.tarif_layanan') }}</span>
                    <h3 class="section-title text-center">{{ __('ui.tarif_layanan') }}</h3>
                    <p class="section-subtitle text-center">{{ __('ui.informasi_tarif') }}</p>
                </div>
                <div class="tarif-table-wrapper">
                    <table class="jadwal-table">
                        <thead>
                            <tr>
                                <th>{{ __('ui.jenis_layanan') }}</th>
                                <th>{{ __('ui.satuan') }}</th>
                                <th>{{ __('ui.estimasi_waktu') }}</th>
                                <th>{{ __('ui.tarif') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>{{ __('ui.konsultasi_teknis') }}</strong></td>
                                <td>{{ __('ui.per_sesi') }}</td>
                                <td>{{ __('ui.jam_1_2') }}</td>
                                <td>{{ __('ui.gratia_konsultasi') }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ __('ui.pengujian_lab') }}</strong></td>
                                <td>{{ __('ui.per_sampel') }}</td>
                                <td>{{ __('ui.hari_3_7') }}</td>
                                <td>{{ __('ui.sesuai_jenis') }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ __('ui.pendampingan_umkm') }}</strong></td>
                                <td>{{ __('ui.per_paket') }}</td>
                                <td>{{ __('ui.bulan_1_3') }}</td>
                                <td>{{ __('ui.termasuk_kunjungan') }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ __('ui.pengembangan_produk') }}</strong></td>
                                <td>{{ __('ui.per_proyek') }}</td>
                                <td>{{ __('ui.sesuai_kebutuhan') }}</td>
                                <td>{{ __('ui.proposal_khusus') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="tarif-note">
                    <i class="fas fa-info-circle"></i>
                    {{ __('ui.tarif_note') }}
                </p>
            </div>

        </div>
    </section>

</div>
@endsection

