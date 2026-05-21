@props(['class' => 'w-10 h-10'])

<div {{ $attributes->merge(['class' => $class . ' bg-indigo-600 rounded-lg flex items-center justify-center']) }}>
    <span class="text-white font-bold text-lg">U</span>
</div>
