@extends('layouts.main')

@section('container')
    {{-- <div class="w-screen h-screen flex flex-col justify-center items-center bg-gray-600">
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
    </div> --}}

    {{-- @livewire('search-page') --}}
    <livewire:search-page />

    {{-- <div class="bg-gray-50 min-h-screen">
      <div class="flex flex-col w-screen">
        <div class="flex flex-row flex-1 py-4 text-white font-bold justify-between flex-wrap bg-slate-900">
          <div class="grid grid-cols-10 basis-10/12 justify-between">
            <div class="font-mono text-3xl tracking-widest col-span-2 justify-self-center">Sibaca</div>
            <input type="search" name="query" class="min-w-full text-black px-2 col-span-4 rounded-md" 
            </form>
          </div>
          <div class="mr-14">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
            </svg>
          </div>
        </div>
        <div class="flex flex-row flex-1 justify-between flex-wrap divide-y divide-gray-300/50s">
            <div class="grid grid-cols-10 basis-10/12 justify-between py-4">
              <div class="col-span-2 justify-self-center">Filters Off</div>
              <div class="col-span-8 text-gray-500 font-light">
                About {{ $results->total() }} results
              </div>
            </div>
            <div class="grid grid-cols-10 basis-10/12 justify-between py-8">
              <div class="col-span-2 justify-self-center">Sibaca</div>
              <div id="results" class="col-span-8">
                @foreach ($results as $result)
                  <div class="mb-4">
                    <a href="/details/{{ $result->id }}" class="text-xl font-bold text-blue-700 hover:text-purple-700"> {{ $result->title }} </a>
                    <div>
                      @foreach ($result->authors as $author)
                          <a href="" class="font-medium hover:text-green-900 text-lime-700">{{ $author->author }}</a>
                      @endforeach
                    </div>
                    <p class="line-clamp-3 md:line-clamp-2">{{ $result->abstract }}</p>
                  </div>
                @endforeach
                <div class="mt-12">
                  {{ $results->links() }}
                </div>
              </div>
            </div>
        </div>
      </div>    
    </div> --}}
@endsection