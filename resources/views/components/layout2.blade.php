<!doctype html>
<html lang="en">
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title class="title"></title>
</head>
<body class="bg-white dark:bg-gray-900">

<a href="{{ URL::previous() }}" class="text-gray-300">
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="size-6" viewBox="0 0 320 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>
    <p class="">
        Voltar
    </p>
</a>

<h1 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-white">{{ $title }}</h1>

{{ $slot }}

</body>
</html>
