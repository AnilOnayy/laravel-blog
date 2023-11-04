@props(['color' => 'green'])

<div class="bg-{{ $color }}-200 text-{{ $color }}-600 rounded-3xl px-4 py-2 text-center font-semibold">
    {{ $slot }}
</div>
