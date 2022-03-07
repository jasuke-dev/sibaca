@extends('layouts.main')

@section('container')
    <div class="w-screen h-screen flex flex-col justify-center items-center bg-gray-600">
        <div class="text-white text-9xl mb-6">
          SIBACA
        </div>
        <div class="relative sm:w-4/5 md:w-2/5 lg:w-3/12">
            <div class="absolute inset-y-auto flex items-center pl-2 mt-2">
              <svg class="w-6 h-6 text-gray-200" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"
                ></path>
              </svg>
            </div>
            <form action="/search" method="GET">
              <input class="w-full h-10 rounded-md pl-10 bg-gray-600 border border-2-gray-200 focus:border-0 focus:outline-none focus:bg-gray-700 text-lg focus:text-gray-200" type="text" placeholder="Search Here" name="query">
            </form>
        </div>
    </div>
    <div id="result">
    
    </div>                
@endsection