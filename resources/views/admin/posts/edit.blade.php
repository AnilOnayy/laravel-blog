    <x-layout>
    <x-setting heading="Publish New Post" >
        <form action="/admin/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input  :name="'title'" :value="old('title', $post->title)" />

            <div class="flex mt-6">
                <div class="flex-1  items-end">
                    <x-form.input  :name="'thumbnail'" type="file" :value="old('thumbnail',$post->thumbnail)" />
                </div>
                @if ($post->thumbnail)
                    <img src="{{ asset('storage/'.$post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100" >
                @endif
            </div>


            <x-form.input  name="slug" :value="old('slug', $post->slug)"  />
            <x-form.textarea  name="excerpt" > {{ old('excerpt', $post->excerpt) }} </x-form.textarea>
            <x-form.textarea  name="body" > {{ old('body', $post->body) }} </x-form.textarea>

            <x-form.select :title="'category'" name="category_id" >
                <option hidden disabled selected value="0">Select Category</option>
                @foreach (App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}" {{ $post->category->id === $category->id  ? 'selected' : '' }} >{{ $category->name }}</option>
                @endforeach
            </x-form.select>

            <x-primary-button >Update</x-primary-button>
        </form>
    </x-setting>


</x-layout>
