<x-layout>

    <x-setting heading="Posts" >

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                <tbody>
                    @foreach ($posts as $post)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a class="text-blue-600" href="/posts/{{ $post->slug }}" target="_blank">
                            {{ $post->title }}
                            </a>
                        </th>

                        <td class="px-6 py-4">
                            @php
                                $is_published = $post->published_at != null;
                                $text = $is_published ? 'Published' : 'Not Published';
                                $color = $is_published ? 'green' : 'red';
                            @endphp
                            <span class="text-center px-2 inline-flex text-xs font-semibold leading-5 rounded-full bg-{{ $color }}-100 text-{{ $color }}-800">
                                {{ $text }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <a href="/admin/posts/{{ $post->id }}/edit">Edit</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </x-setting>


</x-layout>
