@props(['trigger'])

<div x-data="{ show:false }" @click.away="show = false">

    {{-- Trigger --}}
    <div @click="show = !show">
        {{ $trigger }}
    </div>


    {{-- Links --}}
    <div x-show="show" class="py-2  mt-2  absolute bg-gray-100 mt-2 rounded-xl z-50" style="display: none; max-height: 300px; overflow-y:auto">
        {{ $slot }}
    </div>

</div>
