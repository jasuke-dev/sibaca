<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIBACA</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href= {{ asset("css/tailwind.output.css") }} />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src={{ asset("js/template/init-alpine.js") }}></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    {{-- data table --}}
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    {{-- end data table --}}
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      defer
    ></script>
    <script src={{ asset("js/template/charts-lines.js") }} defer></script>
    <script src={{ asset("js/template/charts-pie.js") }} defer></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script>
    {{-- multiple select --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    {{-- @include('sweetalert::alert') --}}
    @include('admin.layouts.partials.sidebar')

    <div class="flex flex-col flex-1 w-full">
        @include('admin.layouts.partials.header')
        @yield('container')
    </div>

    @stack('script')
    <script src="http://127.0.0.1:8000/js/bundle.js"></script>
    <script>


        function confirm(event, id){
          event.preventDefault();
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            // confirmButtonColor: '#7C3AED',
            cancelButtonColor: '#FF5A26',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if(result.isConfirmed){
              document.getElementsByClassName(id)[0].submit()
            }
          })
        }
        function confirmUser(event, id){
          event.preventDefault();
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            // confirmButtonColor: '#7C3AED',
            cancelButtonColor: '#FF5A26',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if(result.isConfirmed){
              document.getElementsByClassName(id)[0].submit()
            }
          })
        }
        function confirmReturn(event, id){
          event.preventDefault();
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            // confirmButtonColor: '#7C3AED',
            cancelButtonColor: '#FF5A26',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if(result.isConfirmed){
              document.getElementsByClassName(id)[0].submit()
            }
          })
        }
        function showImage() {
            return {
                showPreview(event) {
                    if (event.target.files.length > 0) {
                        var src = URL.createObjectURL(event.target.files[0]);
                        var preview = document.getElementById("preview");
                        preview.src = src;
                        preview.style.display = "block";
                    }
                }
            }
        }

        function dropdown() {
          return {
              options: [],
              selected: [],
              show: false,
              open() { this.show = true },
              close() { this.show = false },
              isOpen() { return this.show === true },
              select(index, event) {

                  if (!this.options[index].selected) {

                      this.options[index].selected = true;
                      this.options[index].element = event.target;
                      this.selected.push(index);

                  } else {
                      this.selected.splice(this.selected.lastIndexOf(index), 1);
                      this.options[index].selected = false
                  }
              },
              remove(index, option) {
                  this.options[option].selected = false;
                  this.selected.splice(index, 1);


              },
              loadOptions() {
                  const options = document.getElementById('select').options;
                  for (let i = 0; i < options.length; i++) {
                      this.options.push({
                          value: options[i].value,
                          text: options[i].innerText,
                          selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
                      });
                  }


              },
              selectedValues(){
                  return this.selected.map((option)=>{
                      return this.options[option].value;
                  })
              }
          }
      }
    </script>
    {{-- data table --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript">
       $(function () {
         var table = $('.data-table').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ route('jenis.index') }}",
             columns: [
                 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                 {data: 'jenis', name: 'jenis'},
             ]
         });
       });
        
    </script>
</body>
</html>