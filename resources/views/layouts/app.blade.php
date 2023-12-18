<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <title>Laravel Task App</title>
    @yield('styles')
</head>

<body class="container mx-auto py-10 max-w-lg">
    <h1 class="text-3xl mb-4">@yield('title')</h1>
    <main x-data="{ flash: true }">
        @if (session()->has('success'))

        <div x-show="flash" role="alert"
            class="flex justify-between items-center py-5 px-8 bg-green-50 text-green-700 border border-green-500 rounded-md text-lg mb-4">
            <span>{{session('success')}}</span>
            <span @click="flash = false"
                class="px-3 py-3 rounded-full -my-3 -mx-3 hover:bg-green-100/80 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </span>
        </div>

        @endif
        @yield('content')
    </main>
</body>

</html>