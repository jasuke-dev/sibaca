<!DOCTYPE html>
<html class="antialiased" x-data="data()">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/tomSelect.js') }}"></script>
    <script src={{ asset("js/template/init-alpine.js") }}></script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script>
        if (localStorage.theme === 'dark' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.classList.add('dark')
            } else {
            console.log("remove")
            document.documentElement.classList.remove('dark')
        }
    </script>
    <title>Document</title>
    @livewireStyles
</head>
<body class="font-sans overflow-x-hidden">

    @yield('container')

    @livewireScripts
</body>
</html>
