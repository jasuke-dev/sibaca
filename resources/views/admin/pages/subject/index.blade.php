@extends('admin.layouts.main')

@section('container')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-4 mx-auto">
            <div class="flex justify-between items-center py-3">
                {{-- judul --}}
                <h2 class="my-6 text-4xl font-semibold text-gray-700 dark:text-gray-200">
                    Subject
                </h2>

                {{-- add button --}}
                <a class="w-2/12 flex items-end justify-between p-4 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" href="subject/create">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                        </svg>
                        <span>Add New Subject</span>
                    </div>
                    <span>&RightArrow;</span>
                </a>
            </div>
            

            <livewire:subject-datatables/>

            

            
        </div>
    </main>
@endsection