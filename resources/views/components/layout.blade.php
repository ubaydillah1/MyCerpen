<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <link rel="stylesheet" href="{{ asset('build/assets/app-BB_AdcNP.css') }}">
</head>

<body>
    <x-navbar></x-navbar>
    <x-aside></x-aside>
    <main class="absolute top-16 left-64 overflow-hidden pl-20 pt-10 z-0">
        <div>
            {{ $slot }}
        </div>
    </main>

</body>
</html>
    