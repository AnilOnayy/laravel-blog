<x-dropdown>
    <x-slot name="trigger">
        <button id="author-button"
            class="text-left py-2 pl-3 text-sm font-semibold w-full lg:w-32 inline-flex">
            {{ isset($currentAuthor) ? ucwords($currentAuthor->name) : 'Authors' }}

            <x-icon name="down-arrow" class="absolute pointer-events-none"></x-icon>
        </button>
    </x-slot>
    <x-dropdown-item href="/?{{ http_build_query(request()->except('author')) }}" :active="url()->full() === '/'">All</x-dropdown-item>
    @foreach ($authors as $author)
        <x-dropdown-item href="/?author={{ $author->username }}&{{ http_build_query(request()->except('author','page')) }}" :active="request('author') === $author->username">
            {{ ucwords($author->name) }}
        </x-dropdown-item>
    @endforeach

</x-dropdown>
