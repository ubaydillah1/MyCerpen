<x-layout>
    <header>
        <h1 class="text-3xl font-bold font-sans">Kisah Lengkap</h1>
    </header>

        <article class="py-8 max-w-screen-md border-b border-gray-500">
            <h2 class="mb-1 text-3xl tracking-tight ">{{ $post['title'] }}</h2>
            <div class="text-base text-gray-500">
                Oleh : 
                <a class="hover:underline" href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> 
                 | Genre : <a href="/categories/{{ $post->category->id }}" class="hover:underline text-base text-gray-500">{{ $post->category->name }}</a>
                | {{ $post["created_at"]->diffForHumans()}} 
            </div>
            <p class="my-4 font-light" style="white-space: pre-line;">{!! nl2br($post->body) !!}</p>
            <a href="/" class="font-medium text-blue-500">Kembali &laquo;</a>
        </article>

</x-layout>

