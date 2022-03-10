<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="{{ asset('js/tomSelect.js') }}"></script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
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
