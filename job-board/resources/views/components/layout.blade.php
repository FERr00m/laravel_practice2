<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    >
    <!-- Fonts -->
    <link
        rel="preconnect"
        href="https://fonts.bunny.net"
    >
    <link
        href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600"
        rel="stylesheet"
    />

    @vite(["resources/css/app.css", "resources/js/app.js"])
    <title>Document</title>
</head>

<body class="mx-auto mt-10 max-w-2xl bg-slate-200 text-slate-700 bg-gradient-to-r from-indigo-500 from-10% via-sky-200 via-50% to-emerald-200 to-100%">
    <nav class="mb-8 flex justify-between">
        <ul class="flex space-x-2">
            <li>
                <a href="{{ route('works.index') }}">Home</a>
            </li>
        </ul>

        <ul class="flex space-x-2">
            @auth
                <li>
                    <a href="{{ route('my-work-application.index') }}">
                        {{ auth()->user()->name ?? 'Anonymus' }}: Applications
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('auth.destroy') }}">
                        @csrf
                        @method('DELETE')

                        <button class="border-1 p-2 cursor-pointer" type="submit">Logout</button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('auth.create') }}">Sign in</a>
                </li>
            @endauth
        </ul>
    </nav>

    @if(session('success'))
        <div role="alert" class="my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-75">
            <p class="font-bold">Success!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    {{ $slot }}
</body>

</html>
