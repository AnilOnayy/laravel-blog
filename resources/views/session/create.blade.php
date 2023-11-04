<x-layout>
    <main class="mx-auto mt-10 lg:mt-20 space-y-6 max-w-md">
        <x-panel class="w-full">
            <h1 class="text-center text-4xl font-extrabold"> Log In </h1>
            <form method="POST" action="/sessions" class="mt-10">
                @csrf

                <x-form.input name="email" />
                <x-form.input name="password" type="password" />

                <a href="/register" class="mb-4 block text-blue-700 underline">Create a new account</a>
                <div class="mb-6">
                    <x-primary-button>Log In</x-primary-button>
                </div>
            </form>
        </x-panel>

    </main>
</x-layout>
