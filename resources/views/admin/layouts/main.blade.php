<!DOCTYPE html>

<html class="overflow-hidden" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIBACA</title>
    <script src={{ asset("js/template/init-alpine.js") }}></script>
    <script src={{ asset("js/template/focus-trap.js") }}></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="{{ asset('js/tomSelect.js') }}"></script>
    <script>
      if (localStorage.theme === 'dark' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
          document.documentElement.classList.add('dark')
          } else {
          console.log("remove")
          document.documentElement.classList.remove('dark')
      }
    </script>
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    {{-- livewire --}}
    @livewireStyles
    {{-- livewire --}}
  </head>
  <body class="font-sans">
    @include('sweetalert::alert')
    <div class="flex w-screen h-screen bg-gray-50 dark:bg-gray-900 overflow-hidden">
      {{-- @include('sweetalert::alert') --}}
      @include('admin.layouts.partials.sidebar')

      <div class="flex flex-col flex-1 w-full flex-grow">
          @include('admin.layouts.partials.header')
          @yield('container')
      </div>
    </div>
    @include('admin.layouts.partials.modal')
    @stack('script')
    {{-- <script src="http://127.0.0.1:8000/js/bundle.js"></script> --}}
    
    {{-- livewire --}}
    @livewireScripts
    {{-- livewire --}}

    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script>
        const progress = document.getElementById('progress-input');
        function progressInput(){
          fetch('/progress-import')
            .then(responese => responese.json())
            .then( data =>{
              console.log(data);
              if(data.progress != 2){
                progress.innerHTML = data.progress;
                setTimeout(progressInput, 100);
              }
            })
        }
        const inputElement = document.getElementById('input')

        // Create a FilePond instance
        const pond = FilePond.create(inputElement);

        FilePond.setOptions({
          server: {
            url: '/import/collections',
            process:{
              onload: (responese) =>{
                console.log(responese)
                progressInput();
              }
            },
            headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
          },
        })
    </script>    
</body>
</html>