<x-dropdown>
    <x-slot name="trigger">
        <button id="category-button"
            class="text-left py-2 pl-3 text-sm font-semibold w-full lg:w-32 inline-flex">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}

            <x-icon name="down-arrow" class="absolute pointer-events-none"></x-icon>
        </button>
    </x-slot>
    <x-dropdown-item href="/?{{ http_build_query(request()->except('category')) }}" :active=" url()->full() === '/'">All</x-dropdown-item>
    @foreach ($categories as $category)
        <x-dropdown-item href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category','page')) }}" :active="request('category') === $category->slug">
            {{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach

</x-dropdown>
