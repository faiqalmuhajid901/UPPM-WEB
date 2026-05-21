@extends('layouts.frontend')
@section('title', __('ui.kkn_title'))

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ __('ui.kkn_heading') }}</h1>
        <div class="w-24 h-1 bg-teal-500 mx-auto"></div>
    </div>

    @if($contents->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($contents as $item)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
                    @if($item->image)
                        <div class="relative h-48 overflow-hidden">
                             <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-500">
                        </div>
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">
                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $item->title }}</h3>
                        <p class="text-gray-600 text-sm mb-4 flex-1">{{ \Illuminate\Support\Str::limit($item->description, 100) }}</p>
                        <a href="#" class="text-teal-600 font-semibold text-sm hover:text-teal-800 mt-auto">
                            {{ __('ui.baca_selengkapnya') }} &rarr;
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-12 bg-gray-50 rounded-lg border border-dashed border-gray-300">
            <svg class="mx-auto h-12 w-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
            <p class="mt-2 text-sm text-gray-500 font-medium">{{ __('ui.empty_kkn') }}</p>
        </div>
    @endif
</div>
@endsection
