@extends('admin.layouts.main')

@section('container')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-4 mx-auto">
            <div class="flex justify-between items-center py-3">
                {{-- judul --}}
                <h2 class="my-6 text-4xl font-semibold text-gray-700 dark:text-gray-200">
                    {{ $title }}
                </h2>

                {{-- add button --}}
                <div class="flex gap-2">
                    @if (Route::current()->uri == 'admin/subject')    
                    <label class="h-2/3 flex justify-around p-4 bg-white text-blue rounded-lg shadow-lg tracking-wide border border-blue cursor-pointer hover:bg-blue">
                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="mt-2 text-base leading-normal">Select a file</span>
                        <input type='file' class="hidden" />
                    </label>
                    @endif

                    <a class="flex items-end justify-between p-4 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" href="/admin/{{ $page }}/create">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                              </svg>
                              <span>Add New {{ $title }}</span>
                        </div>
                        <span>&RightArrow;</span>
                    </a>
                </div>
            </div>
            

            @if (Route::current()->uri == 'admin/author')
                @livewire('author-datatables')
            @elseif(Route::current()->uri == 'admin/language')
                @livewire('language-datatables')
            @elseif(Route::current()->uri == 'admin/subject')
                @livewire('subject-datatables')
            @elseif(Route::current()->uri == 'admin/type')
                @livewire('type-datatables')
            @elseif(Route::current()->uri == 'admin/users')
                @livewire('user-datatables')
            @elseif(Route::current()->uri == 'admin/collections')
                @livewire('collection-datatables')            
            @endif
            
        </div>
    </main>
@endsection