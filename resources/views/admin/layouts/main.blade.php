<!DOCTYPE html>

<html :class="!dark ? '': 'dark' " x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIBACA</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src={{ asset("js/template/init-alpine.js") }}></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    {{-- livewire --}}
    @livewireStyles
    {{-- livewire --}}
  </head>
  <body>
    @include('sweetalert::alert')

    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    {{-- @include('sweetalert::alert') --}}
    @include('admin.layouts.partials.sidebar')

    <div class="flex flex-col flex-1 w-full">
        @include('admin.layouts.partials.header')
        @yield('container')
    </div>

    @stack('script')
    <script src="http://127.0.0.1:8000/js/bundle.js"></script>
    
    {{-- livewire --}}
    @livewireScripts
    {{-- livewire --}}
</body>
</html>