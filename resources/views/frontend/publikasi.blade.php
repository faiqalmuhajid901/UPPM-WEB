@extends('layouts.frontend')
@section('title', __('ui.publikasi_page_title'))

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ __('ui.publikasi_page_title') }}</h1>
        <div class="w-24 h-1 bg-teal-500 mx-auto"></div>
    </div>

    @php
        $items = $publikasis ?? $contents ?? collect();
    @endphp

    @if($items->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($items as $item)
                @php
                    $title = $item->judul ?? $item->title ?? __('ui.publikasi_page_title');
                    $summary = $item->abstrak ?? $item->excerpt ?? $item->description ?? '';
                    $image = $item->image ?? null;
                    $imageUrl = $item->image_url ?? (!empty($image) ? asset('storage/' . $image) : null);
                    $fileUrl = $item->file_url ?? (!empty($item->file) ? asset('storage/' . $item->file) : null);
                    $externalUrl = $item->url ?? null;
                    $actionUrl = $externalUrl ?: $fileUrl ?: '#';
                @endphp
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
                    @if($imageUrl)
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ $imageUrl }}" alt="{{ $title }}" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-500">
                        </div>
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">{{ __('ui.no_image') }}</div>
                    @endif
                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $title }}</h3>
                        <p class="text-gray-600 text-sm mb-4 flex-1">{{ \Illuminate\Support\Str::limit(strip_tags($summary), 100) }}</p>
                        <a href="{{ $actionUrl }}" class="text-teal-600 font-semibold text-sm hover:text-teal-800 mt-auto" @if($actionUrl !== '#') target="_blank" rel="noopener" @endif>
                            {{ __('ui.view_publication') }} &rarr;
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-12 bg-gray-50 rounded-lg border border-dashed border-gray-300">
            <p class="text-gray-500 italic">{{ __('ui.empty_publikasi') }}</p>
        </div>
    @endif
</div>
@endsection
