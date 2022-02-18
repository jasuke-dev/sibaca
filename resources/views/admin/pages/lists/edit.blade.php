@extends('admin.layouts.main')

@section('container')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Edit Collections
            </h2>
        </div>

        {{-- form --}}
        <form action="/admin/collections" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="w-8/12 mx-8 px-8 py-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label for="title" class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Title</span>
                    <input type="text" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="New title collection" name="title" value="{{ old('slug' , $collection->title) }}" required autofocus disabled>
                    @error("title")
                        <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </div>
                    @enderror
                </label>  
                <label for="isbn_issn_doi" class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">ISBN/ISSN/DOI</span>
                    <input type="text" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="ISBN/ISSN/DOI" value="{{ old('isbn_issn_doi', $collection->isbn_issn_doi) }}" name="isbn_issn_doi" required disabled>
                    @error('isbn_issn_doi')
                        <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </div>
                    @enderror
                </label>
                <label for="abstract" class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Abstract</span>
                    <input type="text" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="Abstract" value="{{ old('abstract', $collection->abstract) }}" name="abstract" required disabled>
                    @error('abstract')
                        <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </div>
                    @enderror
                </label>
                <label for="publish_year" class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Publication year</span>
                    <input type="text" id="publish_year" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="Publication Year" value="{{ old('publish_year', $collection->publish_year) }}" name="publish_year" required disabled>
                    @error('publish_year')
                        <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </div>
                    @enderror
                </label>
                <label for="type" class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Type Collection</span>
                    <select class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" name="type" required disabled>
                      @foreach ($types as $type)
                        @if (old('type', $collection->type) == $type->id)
                          <option value="{{ $type->id }}" selected>{{ $type->type }}</option>
                        @else
                          <option value="{{ $type->id }}">{{ $type->type }}</option>
                        @endif
                      @endforeach
                    </select>
                    @error('type')
                    <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                      {{ $message }}
                    </div>
                    @enderror
                </label>
                <label for="language" class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Language</span>
                    <select class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" name="language" required disabled>
                      @foreach ($languages as $language)
                        @if (old('type', $collection->language) == $language->id)
                          <option value="{{ $language->id }}" selected>{{ $language->language }}</option>
                        @else
                          <option value="{{ $language->id }}">{{ $language->language }}</option>
                        @endif
                      @endforeach
                    </select>
                    @error('language')
                        <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </div>
                    @enderror
                </label>
                <label for="author" class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Author</span>
                    <select class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" name="author" required disabled>
                      @foreach ($authors as $author)
                        @if (old('author', $collection->author) == $author->id)
                          <option value="{{ $author->id }}" selected>{{ $author->author }}</option>
                        @else
                          <option value="{{ $author->id }}">{{ $author->author }}</option>
                        @endif
                      @endforeach
                    </select>
                    @error('author')
                        <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </div>
                    @enderror
                </label>
                <label for="file" class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">File</span>
                    <input type="file" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="Ebook File" name="file">
                    @error('file')
                        <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </div>
                    @enderror
                </label>
                <label for="Cover" class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Cover</span>
                    <input type="file" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="Cover Image" name="cover">
                    @error('cover')
                        <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </div>
                    @enderror
                </label>
                <button class="flex items-center justify-between mt-6 px-8 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                    </svg>
                   <span>Edit</span>
                  </button>
            </div>
        </form>
    </main>
@endsection