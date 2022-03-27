<!DOCTYPE html>
<html :class="!dark ? '': 'dark' " x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('js/tomSelect.js') }}"></script>
    <script src={{ asset("js/template/init-alpine.js") }}></script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>Document</title>
    @livewireStyles
</head>
<body class="font-sans bg-gray-50 dark:bg-gray-900">

    @yield('container')

    @livewireScripts
    <script src="http://127.0.0.1:8000/js/bundle.js"></script>
</body>
</html>
