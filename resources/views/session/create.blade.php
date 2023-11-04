<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <x-panel>
            <h1 class="text-center text-4xl font-extrabold"> Log In </h1>
            <form method="POST" action="/sessions" class="mt-10">
                @csrf

                <x-form.input name="email" />
                <x-form.input name="password" type="password" />

                <div class="mb-6">
                    <x-primary-button>Log In</x-primary-button>
                </div>
            </form>
        </x-panel>

    </main>
</x-layout>
