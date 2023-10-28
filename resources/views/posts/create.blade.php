<x-layout>
    <section class="px-6 py-8 w-1/2 mx-auto mt-12 max-w-lg">
        <x-panel>
            <form action="/admin/posts/create" method="POST" enctype="multipart/form-data">
                <h1 class="text-xl font-bold mb-4 text-center">Publish New Post</h1>
                @csrf


                <x-form.input  :name="'title'" />
                <x-form.input  :name="'thumbnail'" :type="'file'" />
                <x-form.input  :name="'slug'" />
                <x-form.input  :name="'excerpt'" />
                <x-form.textarea  :name="'excerpt'" />
                <x-form.textarea  :name="'body'" />
                <x-form.select :title="'category'" :name="'category_id'" >
                    <option hidden disabled selected value="0">Select Category</option>
                    @foreach (App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') === $category->id  ? 'selected' : '' }} >{{ $category->name }}</option>
                    @endforeach
                </x-form.select>

                <x-primary-button >Create</x-primary-button>
            </form>
        </x-panel>
    </section>
</x-layout>
