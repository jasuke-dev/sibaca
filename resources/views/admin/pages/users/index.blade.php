@extends('admin.layouts.main')

@section('container')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-4 mx-auto">
        
        {{-- <livewire:TableUser-datatables
            searchable="name, email"
            exportable
         />         --}}
         <livewire:datatable model="App\Models\User" exclude="created_at, updated_at" />
    </div>
</main>

@endsection