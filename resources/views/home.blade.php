<x-layout>
    <header>
        <h1 class="text-3xl font-bold font-sans">{{ $title }}</h1>
    </header>

    <div class="row-auto mt-10">
        <div class="">
            <form action="/">
                <div class="input-group flex gap-5">
                    <input type="text" placeholder="Cari Judul..." class="w-full px-5 py-2n border border-gray-500" name="keyword" value="{{ request("keyword") }}">
                    <button class="bg-blue-500 hover:opacity-80 text-white py-3 px-5 rounded-lg" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>

    @foreach ($posts as $post)
        <article class="py-8 max-w-screen-md border-b border-gray-500">
            <h2 class="mb-1 text-3xl tracking-tight ">{{ $post['title'] }}</h2>
            <div class="text-base text-gray-500">
                Oleh : 
                <a class="hover:underline" href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> 
                 | Genre : <a href="/categories/{{ $post->category->id }}" class="hover:underline text-base text-gray-500">{{ $post->category->name }}</a>
                | {{ $post["created_at"]->diffForHumans()}} 
            </div>
            <p class="my-4 font-light">{{ Str::limit(strip_tags($post["body"]) , 100)}}</p>
            <a href="/detail/{{ $post["id"] }}" class="font-medium text-blue-500">Baca lengkap &raquo;</a>
        </article>
    @endforeach


</x-layout>
