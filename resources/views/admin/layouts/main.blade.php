<!DOCTYPE html>

<html class="overflow-hidden" :class="!dark ? '': 'dark' " x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIBACA</title>
    <script src={{ asset("js/template/init-alpine.js") }}></script>
    <script src={{ asset("js/template/focus-trap.js") }}></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="{{ asset('js/tomSelect.js') }}"></script>
    {{-- livewire --}}
    @livewireStyles
    {{-- livewire --}}
  </head>
  <body>
    
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900 overflow-hidden">
    @include('sweetalert::alert')
    {{-- @include('sweetalert::alert') --}}
    @include('admin.layouts.partials.sidebar')

    <div class="flex flex-col flex-1 w-full">
        @include('admin.layouts.partials.header')
        @yield('container')
        @include('admin.layouts.partials.modal')
    </div>

    @stack('script')
    {{-- <script src="http://127.0.0.1:8000/js/bundle.js"></script> --}}
    
    {{-- livewire --}}
    @livewireScripts
    {{-- livewire --}}

    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>