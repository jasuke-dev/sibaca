@extends('admin.layouts.main')

@section('container')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Add Type
            </h2>
        </div>

        {{-- form --}}
        <form action="/admin/type/{{ $type->id }}" method="POST">
            @csrf
            @method('put')
            <div class="mx-8 px-8 py-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label for="type" class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Type Name</span>
                    <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Type Name" name="type" value="{{ old('type', $type->type) }}" required>
                    @error('type')
                        <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </div>
                    @enderror
                </label>

                <button class="flex items-center justify-between mt-6 px-8 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                    </svg>
                   <span>Update</span>
                  </button>
            </div>
        </form>
    </main>
@endsection