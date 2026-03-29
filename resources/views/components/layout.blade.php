<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title class="title"></title>
</head>
<body>

{{ $header }}

{{ $slot }}

{{ $footer }}

</body>
</html>
