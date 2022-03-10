<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="/css/app.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @livewireStyles
</head>
<body>

    @yield('container')

    @livewireScripts
    <script src="http://127.0.0.1:8000/js/bundle.js"></script>
</body>
</html>
