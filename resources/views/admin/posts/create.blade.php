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
            <x-form.select :title="'status'" name="status" >
                <option value="0" hidden selected>Select Status</option>
                <option value="active" >Active</option>
                <option value="draft" >Draft</option>
                <option value="passive" >Passive</option>
            </x-form.select>

            <x-primary-button >Create</x-primary-button>
        </form>

    </x-setting>


</x-layout>
