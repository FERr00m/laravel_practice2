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

<body class="mx-auto mt-10 max-w-2xl bg-slate-200 text-slate-700">
    {{ $slot }}
</body>

</html>
