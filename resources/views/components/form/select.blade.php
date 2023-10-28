@props(['name','title'])


<x-form.field>
    <x-form.label :name="$title" />

    <select
    class="border border-gray-400 p-2 w-full rounded"
    name="{{ $name }}"
    id="{{ $name }}">
        {{ $slot }}
    </select>
    <x-form.error :name="$name" />
</x-form.field>
