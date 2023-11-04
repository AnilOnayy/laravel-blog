@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-xl font-bold my-4 pb-4 border-b">{{ $heading }}</h1>


    <div class="flex gap-4">


        <aside class="w-48 flex-shrink-0 bg-gray-800">
            <h4 class="font-semibold  text-gray-200 text-center text-2xl mt-3"> Menu </h4>
            <ul class="py-4">
                <li class="px-6 py-3 text-gray-200 flex">
                    <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' :'' }} flex">
                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        All Posts
                    </a>
                </li>
                <li class="px-6 py-3 text-gray-200 flex">
                    <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' :'' }} flex">
                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        New Post
                    </a>
                </li>
            </ul>
        </aside>


        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>


</section>
