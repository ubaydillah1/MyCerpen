<x-layout>
    <header>
        <h1 class="text-3xl font-bold font-sans">My Post</h1>
    </header>

    <div class="relative overflow-x-auto my-10">
        <a href="/add/create" class="text-md bg-blue-600 text-white px-4 py-2 rounded-lg hover:opacity-80 inline-block my-2">Tambah Cerpen</a>
        <table class="text-sm rtl:text-right text-gray-500 dark:text-gray-400 p-10 text-center" border="3" cellspacing="0" cellpadding="10" style="min-width: 1000px">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 w-full p-10">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">
                        Judul
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kategori
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post )

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td class="flex justify-center gap-2 ">
                        <a href="/detail/{{ $post->id }}" class="text-sm bg-blue-600 text-white px-4 py-2 rounded-lg hover:opacity-80 inline-block my-2">Detail</a>
                        <a href="/add/{{ $post->id }}/edit" class="text-md bg-green-600 text-white px-4 py-2 rounded-lg hover:opacity-80 inline-block my-2">Edit</a>

                        <form action="/add/{{ $post->id }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="text-md bg-red-600 text-white px-4 py-2 rounded-lg hover:opacity-80 inline-block my-2">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if ($posts->count() < 1)
                <tr>
                    <td colspan="4" align="center">
                        <h2>Post Tidak Ada</h2>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

</x-layout>