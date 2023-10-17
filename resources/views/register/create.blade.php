<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6 bg-gray-100 border-gray-300 p-6 rounded">
        <h1 class="text-center text-4xl font-extrabold"> Register </h1>
        <form method="POST" action="/register" class="mt-10">
            @csrf
            <div class="mb-6">
                <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Username
                </label>
                <input class="border border-gray-400 p-2 w-full rounded"
                type="text"
                name="username"
                id="username"
                value="{{ old('username') }}"
                >
                @error('username')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Name
                </label>
                <input class="border border-gray-400 p-2 w-full rounded"
                type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
                >
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>



            <div class="mb-6">
                <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    E-Mail
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
                    Submit
                </button>
            </div>

            {{-- @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-500 mb-2 text-sm"> {{ $error }} </li>
                    @endforeach
                </ul>
            @endif --}}


        </form>
    </main>
</x-layout>
