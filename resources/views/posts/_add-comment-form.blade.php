@auth
    <form action="/posts/{{ $post->slug }}/comments" method="post" class="mb-16 border border-1 p-3 rounded">
        @csrf

        <header class="flex items-start space-x-4 mb-8">
            <div>
                <img src="https://i.pravatar.cc/60?id={{ auth()->user()->id }}" alt="image" width="60" height="60">
            </div>
            <div>
                <p>Want to participate?</p>
            </div>

        </header>
        <div class="mb-6">

            <textarea name="body" id="body" cols="30" rows="3"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
            @error('body')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-end">
            <x-primary-button> Submit </x-primary-button>
        </div>
    </form>
@else
    <div class="mb-8">
        <p>Please <a class="text-blue-300" href="/register">register</a> or <a class="text-blue-300"
                href="/login">login</a> to leave comment.</p>
    </div>
@endauth
