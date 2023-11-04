<x-layout>
    <h4 class="my-4 font-semibold text-center text-4xl">Bookmarks</h4>

            @if ($bookmarks->count())
                <table class=" text-sm text-left text-gray-500 dark:text-gray-400 border-separate max-w-2xl w-full mx-auto">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                            <th class="px-4 py-3 text-start">Title</th>
                            <th class="px-4 py-3 text-center">Delete</th>
                            <!-- İhtiyacınıza göre diğer başlık sütunlarını ekleyebilirsiniz -->
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($bookmarks as $bookmark)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a class="text-blue-600" href="/posts/{{ $bookmark->post->slug }}" target="_blank">
                            {{ $bookmark->post->title }}
                            </a>
                        </th>
                        <td class="px-6 py-4">
                            <form action="/bookmarks/{{ $bookmark->id }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <x-rounded-badge color="red">
                                    <button>Delete</button>
                                </x-rounded-badge>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
            <div class="text-center">
                <h6 class="mt-6 text-center text-xl">There is no bookmarked post yet.</h6>
                <a href="/" class="underline text-blue-600"> Lets go add some post!</a>
            </div>

            @endif


            @if($errors->any())
                {{ implode('', $errors->all('<div>:message</div>')) }}
            @endif

</x-layout>
