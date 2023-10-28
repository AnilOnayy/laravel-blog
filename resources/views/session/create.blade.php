<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6 bg-gray-100 border-gray-300 p-6 rounded">
        <h1 class="text-center text-4xl font-extrabold"> Log In </h1>
        <form method="POST" action="/sessions" class="mt-10">
            @csrf
            <div class="mb-6">
                <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    E Mail
                </label>
                <input class="border border-gray-400 p-2 w-full rounded"
                type="text"
                name="email"
                id="email"
                value="{{ old('email') }}"
                >
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Password
                </label>
                <input class="border border-gray-400 p-2 w-full rounded"
                type="password"
                name="password"
                id="password"
                >
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-6">
                <button type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                        >
                    Log In
                </button>
            </div>
        </form>
    </main>
</x-layout>
