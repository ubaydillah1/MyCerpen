
<nav class="fixed z-50 w-full border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 h-16 bg-white">
    <div class="px-3 py-3 lg:px-5 lg:pl-3 h-full">
        <div class="flex items-center justify-between h-full">
           
                <img src="/img/logo.png" alt="logo" class="h-10 w-auto">


                @auth
                <div class="flex gap-10 items-center justify-center">
                    <h2 class="text-xl">Hai <span class="text-indigo-600 font-bold">{{ auth()->user()->name }}</span> </h2>
                    <form action="/logout" method="POST">
                        @csrf 
                        <button type="submit" class="text-md bg-red-600 text-white px-4 py-2 rounded-lg hover:opacity-80">Logout</button>
                    </form>
                </div>
                @else
                    <a href="/login" class="text-md bg-blue-500 text-white px-4 py-2 rounded-lg hover:opacity-80">Login</a>
                @endauth
            
        </div>
    </div>
</nav>