<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    {{-- blade-formater-disable --}}
    <style type="text/tailwindcss">
        .btn {
            @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
        }

        label {
            @apply block uppercase text-slate-700 mb-2
        }

        input, textarea {
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 focus:outline-none
        }
        .error {
            @apply text-sm text-red-500
        }
    </style>
    {{-- blade-formater-enable --}}
    <title>Laravel Tasks List App</title>
</head>
<body class="container mx-auto my-10 max-w-lg">
    <a href="/">MAIN</a>
    <h1 class="text-2xl mb-4">@yield('title')</h1>

    <div x-data="{ flash: true }">
        @if(session()->has('success'))
            <div x-show="flash" role="alert" class="relative mb-10 rounded border border-green-400 text-lg text-green-700 bg-green-100 px-4 py-3">
                <button @click="flash = false" class="absolute top-0 right-0">
                    ❌
                </button>
                <strong class="font-bold">{{ session('success') }}</strong>
            </div>
        @endif
        @yield('content')
    </div>
</body>
</html>
