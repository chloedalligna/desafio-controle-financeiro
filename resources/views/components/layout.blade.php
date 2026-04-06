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

<x-header/>

@if ($errors->any())
    <div class="absolute w-fit top-[15%] left-[2.5%]" role="alert">
        <ul class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@isset($msg)
    <div class="fixed top-[10%] left-[20%] p-4 mb-4 text-sm text-fg-success-strong rounded-base bg-success-soft" role="alert">
        {{ $msg }}
    </div>
@endisset

<h1 class="mt-5 text-center text-2xl/9 font-bold tracking-tight text-white">{{ $title }}</h1>

{{ $slot }}

</body>
</html>
