@extends('layouts.main')

@section('container')
<div class="flex flex-col w-screen bg-gray-50 dark:bg-gray-800">
    <div class="flex flex-row flex-1 py-4 text-white font-bold justify-between flex-wrap bg-white dark:bg-gray-900 shadow-md">
      <div class="grid grid-cols-10 basis-10/12 justify-between">
        <div class="font-mono text-3xl tracking-widest col-span-2 justify-self-center text-gray-800 dark:text-gray-50">
            <a href="/search">
                Sibaca
            </a>
        </div>
        <form action="/search" method="get" class="col-span-4">
            {{-- <input type="text" name="query" class="min-w-full min-h-full text-black border bg-gray-50 px-2 rounded-md" > --}}
            <div class="relative w-full max-w-xl mr-6 text-gray-600 focus-within:text-gray-800 dark:text-gray-200 dark:focus-within:text-white min-h-full">
              <div class="absolute inset-y-0 flex items-center pl-2">
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
              </div>
              <input type="text" name="query" class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-2 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-gray-100 dark:focus:border-gray-500 border-gray-100 dark:border-gray-700 focus:outline-none focus:shadow-outline-purple form-input h-10" >
            </div>
        </form>
      </div>
      <ul class="flex items-center flex-shrink-0 space-x-6 mr-14 text-purple-600 dark:text-purple-300">
        <!-- Theme toggler -->
        <li class="flex">
          <button
            class="rounded-md focus:outline-none focus:shadow-outline-purple"
            @click="toggleTheme"
            aria-label="Toggle color mode"
          >
            <template x-if="!dark">
              <svg
                class="w-5 h-5"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
                ></path>
              </svg>
            </template>
            <template x-if="dark">
              <svg
                class="w-5 h-5"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill-rule="evenodd"
                  d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </template>
          </button>
        </li>
  
        <!-- Profile menu -->
        <li class="relative">
          <button
            class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
            @click="toggleProfileMenu"
            @keydown.escape="closeProfileMenu"
            aria-label="Account"
            aria-haspopup="true"
          >
          <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-600 dark:text-gray-200 object-cover" viewbox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
          </svg>
          </button>
          <template x-if="isProfileMenuOpen">
            <ul
              x-transition:leave="transition ease-in duration-150"
              x-transition:leave-start="opacity-100"
              x-transition:leave-end="opacity-0"
              @click.away="closeProfileMenu"
              @keydown.escape="closeProfileMenu"
              class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
              aria-label="submenu"
            >              
              <li class="flex">
                <form class="w-full" action="/logout" method="POST">
                @csrf
                  <button
                    class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                    type="submit"
                  >
                    <svg
                      class="w-4 h-4 mr-3"
                      aria-hidden="true"
                      fill="none"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                      ></path>
                    </svg>
                    <span>Log out</span>
                  </button>
                </form> 
              </li>
            </ul>
          </template>
        </li>
      </ul>
    </div>
    <div class="py-20 px-60 dark:text-gray-400">
        <div class="grid grid-flow-col grid-cols-6 gap-6">
            <div class="col-span-2 px-10">
                <div class="bg-slate-200 p-5 rounded-md self-baseline h-full">
                    <img class="max-h-full" src="{{ asset('storage/'.$data->path_cover) }}" alt="">
                </div>
            </div>
            <div class="grid grid-flow-row grid-rows-6 col-span-4 gap-4 self-end">
                <div class="row-span-2 space-y-3">
                    <div class="text-3xl font-bold">
                        {{ $data->title }}
                    </div>
                    <div class="text-2xl font-medium">
                        {{ $data->subtitle }}
                    </div>
                    <div>
                        @foreach ($data->authors as $author)
                          {{ $loop->index != 0 ? ','  : '' }}
                          <a href="" class="font-medium hover:text-green-900 text-lime-700 dark:text-lime-500 dark:hover:text-lime-400">{{ $author->full_name }}</a>
                        @endforeach
                    </div>
                    <div>
                        @foreach ($data->subjects as $subject)
                        <button class="bg-slate-200 hover:bg-slate-300 font-normal py-2 px-4 rounded text-sm dark:bg-gray-800 dark:hover:bg-gray-700">{{ $subject->subject }}</button>
                        @endforeach
                    </div>
                </div>
                <div class="row-span-4 space-y-2">
                    <div class="grid grid-cols-4">
                        <div class="col-span-1 font-semibold">ISBN/ISSN/DOI</div>
                        <div class="col-span-3 font-medium">: {{ $data->isbn_issn_doi }}</div>
                    </div>
                    <div class="grid grid-cols-4">
                        <div class="col-span-1 font-semibold">Volume</div>
                        <div class="col-span-3 font-medium">: {{ $data->volume }}</div>
                    </div>
                    <div class="grid grid-cols-4">
                        <div class="col-span-1 font-semibold">Edition</div>
                        <div class="col-span-3 font-medium">: {{ $data->edition }}</div>
                    </div>
                    <div class="grid grid-cols-4">
                        <div class="col-span-1 font-semibold">Collation</div>
                        <div class="col-span-3 font-medium">: {{ $data->collation }}</div>
                    </div>
                    <div class="grid grid-cols-4">
                        <div class="col-span-1 font-semibold">Type</div>
                        <div class="col-span-3 font-medium">: {{ $data->type->type }}</div>
                    </div>
                    <div class="grid grid-cols-4">
                        <div class="col-span-1 font-semibold">Language</div>
                        <div class="col-span-3 font-medium">: {{ $data->language->language }}</div>
                    </div>
                    {{-- <a class="font-bold text-blue-600" href="/pdf/{{ $data->path_file }}">View PDF</a> --}}
                    <a target="" class="font-bold text-blue-600" href="{{ '/pdf/'.$data->id }}">View PDF</a>
                </div>
            </div>
        </div>
        <div class="py-10">
            <div class="font-semibold">
                Abstract
            </div>
            <p class="text-justify">
                {{ $data->abstract }}
            </p>
        </div>
    </div>
</div>

@endsection