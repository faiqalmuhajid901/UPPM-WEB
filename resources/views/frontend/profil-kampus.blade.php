@extends('layouts.frontend')
@section('title', 'Profil Kampus')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Profil Kampus</h1>
        <div class="w-24 h-1 bg-teal-500 mx-auto"></div>
    </div>

    {{-- 1. BAGIAN TENTANG UPPM (ID: #tentang) --}}
    <section id="tentang" class="mb-20 scroll-mt-20">
        @if(isset($contents['profil_tentang']))
            @foreach($contents['profil_tentang'] as $item)
                <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col md:flex-row">
                    @if($item->image)
                        <div class="md:w-1/3">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-64 md:h-auto object-cover">
                        </div>
                    @endif
                    <div class="p-8 md:w-2/3">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4 border-b pb-2 border-gray-100">{{ $item->title }}</h2>
                        <div class="prose text-gray-600 break-all">
                            {!! $item->description !!}
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="bg-white p-12 rounded-xl shadow-sm border border-dashed border-gray-300 text-center">
                <p class="text-gray-400 italic">Belum ada konten untuk "Tentang UPPM".</p>
            </div>
        @endif
    </section>

    {{-- 2. BAGIAN VISI & MISI (ID: #visi-misi) --}}
    <section id="visi-misi" class="mb-20 scroll-mt-20">
        @if(isset($contents['profil_visi']))
            @foreach($contents['profil_visi'] as $item)
                <div class="bg-white rounded-xl shadow-md p-8 md:p-12">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2 border-gray-100 flex items-center">
                        <svg class="w-6 h-6 text-teal-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        {{ $item->title }}
                    </h2>
                    <div class="prose max-w-none text-gray-600 break-all white-pre-wrap">
                        {!! $item->description !!}
                    </div>
                </div>
            @endforeach
        @else
            <div class="bg-white p-12 rounded-xl shadow-sm border border-dashed border-gray-300 text-center">
                <p class="text-gray-400 italic">Belum ada konten untuk "Visi & Misi".</p>
            </div>
        @endif
    </section>

    {{-- 3. BAGIAN STRUKTUR ORGANISASI (ID: #struktur) --}}
    <section id="struktur" class="scroll-mt-20">
        @if(isset($contents['profil_struktur']))
            @foreach($contents['profil_struktur'] as $item)
                <div class="bg-white rounded-xl shadow-md p-8 md:p-12">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2 border-gray-100 flex items-center">
                        <svg class="w-6 h-6 text-teal-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1"></path></svg>
                        {{ $item->title }}
                    </h2>
                    @if($item->image)
                        <div class="my-6">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="Struktur" class="mx-auto rounded-lg shadow-sm">
                        </div>
                    @endif
                    <div class="prose max-w-none text-gray-600 break-all white-pre-wrap">
                        {!! $item->description !!}
                    </div>
                </div>
            @endforeach
        @else
            <div class="bg-white p-12 rounded-xl shadow-sm border border-dashed border-gray-300 text-center">
                <p class="text-gray-400 italic">Belum ada konten untuk "Struktur Organisasi".</p>
            </div>
        @endif
    </section>

</div>
@endsection