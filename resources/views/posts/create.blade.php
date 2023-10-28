<x-layout>
    <section class="px-6 py-8 w-1/2 mx-auto mt-12 max-w-lg">
        <x-panel>
            <form action="/admin/posts/create" method="POST" enctype="multipart/form-data">
                <h1 class="text-xl font-bold mb-4 text-center">Publish New Post</h1>
                @csrf
                <div class="mb-6">
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Title
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded"
                    type="text"
                    name="title"
                    id="title"
                    value="{{ old('title') }}"
                    >
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="thumbnail" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Thumbnail
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded"
                    type="file"
                    name="thumbnail"
                    id="thumbnail"
                    accept=".png,.jpg,.jpeg"
                    value="{{ old('thumbnail') }}"
                    >
                    @error('thumbnail')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Slug
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded"
                    type="text"
                    name="slug"
                    id="slug"
                    value="{{ old('slug') }}"
                    >
                    @error('slug')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Excerpt
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded"
                    type="text"
                    name="excerpt"
                    id="excerpt"
                    value="{{ old('excerpt') }}"
                    >
                    @error('excerpt')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        body
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded"
                    type="text"
                    name="body"
                    id="body"
                    value="{{ old('body') }}"
                    >
                    @error('body')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label for="category" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Category
                    </label>

                    <select name="category_id" id="category" class="border border-gray-400 p-2 w-full rounded">
                        <option hidden disabled selected value="0">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') === $category->id  ? 'selected' : '' }} >{{ $category->name }}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button type="submit"
                            class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-700"
                            >
                        Create
                    </button>
                </div>

            </form>
        </x-panel>
    </section>
</x-layout>
