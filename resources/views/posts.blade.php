<x-layout>

    @foreach ($posts as $post)
    <article class="{{ $loop->even ? 'foobar' : '' }}">
        <a href="/posts/{{ $post->id }}">
            <h1>
                {{ $post->title }}
            </h1>
        </a>

        <div>
            {{ $post->excerpt }}
        </div>
    </article>
    @endforeach

</x-layout>