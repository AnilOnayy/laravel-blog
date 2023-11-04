<x-layout>

    <x-setting heading="Posts" >

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-separate">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                        <th class="px-4 py-3 text-start">Title</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3 text-center">Edit</th>
                        <th class="px-4 py-3 text-center">Delete</th>
                        <!-- İhtiyacınıza göre diğer başlık sütunlarını ekleyebilirsiniz -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a class="text-blue-600" href="/posts/{{ $post->slug }}" target="_blank">
                            {{ $post->title }}
                            </a>
                        </th>

                        <td class="">
                            <x-post-status-badge  :status="$post->status" />
                        </td>
                        <td class="px-6 py-4">
                            <x-rounded-badge color="yellow">
                                <a href="/admin/posts/{{ $post->id }}/edit" >Edit</a>
                            </x-rounded-badge>
                        </td>

                        <td class="px-6 py-4">
                            <form action="/admin/posts/{{ $post->id }}" id="deleteForm-{{ $post->id }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <x-rounded-badge color="red">
                                    <button  >Delete</button>
                                </x-rounded-badge>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    @if($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                </tbody>
            </table>

            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                                <th class="px-4 py-3">Başlık 1</th>
                                <th class="px-4 py-3">Başlık 2</th>
                                <th class="px-4 py-3">Başlık 3</th>
                                <!-- İhtiyacınıza göre diğer başlık sütunlarını ekleyebilirsiniz -->
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y">
                            <tr class="text-gray-700">
                                <td class="px-4 py-3">Veri 1</td>
                                <td class="px-4 py-3">Veri 2</td>
                                <td class="px-4 py-3">Veri 3</td>
                                <!-- İhtiyacınıza göre diğer veri sütunlarını ekleyebilirsiniz -->
                            </tr>
                            <!-- İhtiyacınıza göre diğer satırları ekleyebilirsiniz -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </x-setting>


</x-layout>
