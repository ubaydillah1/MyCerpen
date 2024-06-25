<x-layout>
    <header>
        <h1 class="text-3xl font-bold font-sans">Tambahkan Cerpen</h1>
    </header>

    <div style="width: 1000px" class="my-10">
        <form action="/add" method="POST" >
            @csrf
            <div class="my-3">
                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Judul</label>
                <div class="mt-2">
                <input id="judul" name="title" type="text" autocomplete=off required class="px-3 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 border @error("name") border-red @enderror">
                </div>
            </div>
            <div class="flex flex-col my-3">
                <label for="category">Category</label>
                <select name="category_id" id="category" class="px-3 block w-full rounded-md py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    @foreach ($categories as $category)
                    <option value="{{ $category -> id }}">{{ $category -> name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="body">Body</label>
                <input id="body" type="hidden" name="body">
                <trix-editor input="body"></trix-editor>
            </div>
                <button type="submit" class="mt-4 flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Buat Post</button>
        </form>
    </div>

</x-layout>