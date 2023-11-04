<x-layout>

    <x-setting heading="Publish New Post" >
        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf

            <x-form.input  :name="'title'" />
            <x-form.input  :name="'thumbnail'" type="file" />
            <x-form.input  :name="'slug'" />
            <x-form.textarea  :name="'excerpt'"> {{ old('excerpt') }} </x-form.textarea>
            <x-form.textarea  :name="'body'"> {{ old('body') }} </x-form.textarea>
            <x-form.select :title="'category'" :name="'category_id'" >
                <option hidden disabled selected value="0">Select Category</option>
                @foreach (App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') === $category->id  ? 'selected' : '' }} >{{ $category->name }}</option>
                @endforeach
            </x-form.select>
            <x-primary-button >Create</x-primary-button>
        </form>
        @if($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
    </x-setting>


</x-layout>
