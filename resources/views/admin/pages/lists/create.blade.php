@extends('admin.layouts.main')

@section('container')
{{-- <select x-cloak id="select" class="hidden">
    <option value="1">Scifi</option>
    <option value="2">Horor</option>
    <option value="3">Romance</option>
    <option value="4">Comedy</option>
</select> --}}
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Add {{ $title }}
            </h2>
        </div>

        {{-- form --}}
        <form action="/admin/{{ $page }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="w-8/12 mx-8 px-8 py-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                @if ($page == 'users')
                    <label for="username" class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">{{ $title }}</span>
                        <input type="text" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="Fill New {{ $title }}" name="username" required autofocus>
                        @error("username")
                            <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </label>    
                    <label for="type" class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Password</span>
                        <input type="text" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="Fill Password" name="password" required>
                        @error('type')
                            <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </label>
                    <div class="mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                          Account Type
                        </span>
                        <div class="mt-2">
                          <label
                            class="inline-flex items-center text-gray-600 dark:text-gray-400"
                          >
                            <input
                              type="radio"
                              class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                              name="role"
                              value="admin"
                            />
                            <span class="ml-2">Admin</span>
                          </label>
                          <label
                            class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400"
                          >
                            <input
                              type="radio"
                              class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                              name="role"
                              value="user"
                            />
                            <span class="ml-2">User</span>
                          </label>
                        </div>
                      </div>

                @elseif ($page == 'collections')    
                    <label for="inventory_code" class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Inventory Code</span>
                        <input type="text" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="New inventory_code collection" name="inventory_code" value="{{ old('inventory_code') }}" autofocus>
                        @error("inventory_code")
                            <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </label>  
                    <label for="isbn_issn_doi" class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">ISBN/ISSN/DOI</span>
                        <input type="text" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="ISBN/ISSN/DOI" value="{{ old('isbn_issn_doi') }}" name="isbn_issn_doi">
                        @error('isbn_issn_doi')
                            <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </label>
                    <label for="title" class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Title</span>
                        <input type="text" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="New title collection" name="title" value="{{ old('title') }}" autofocus>
                        @error("title")
                            <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </label>  
                    <label for="title_code" class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">title_code</span>
                        <input type="text" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="New title_code collection" name="title_code" value="{{ old('title_code') }}" autofocus>
                        @error("title_code")
                            <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </label>  
                    <label for="subtitle" class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Subtitle</span>
                        <input type="text" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="New subtitle collection" name="subtitle" value="{{ old('subtitle') }}" autofocus>
                        @error("subtitle")
                            <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </label>  
                    <label for="abstract" class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Abstract</span>
                        <input type="text" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="Abstract" value="{{ old('abstract') }}" name="abstract">
                        @error('abstract')
                            <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </label>
                    <label for="type" class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">Type Collection</span>
                      <select class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" name="type">
                        @foreach ($types as $type)
                          @if (old('type') == $type->id)
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
                    <label for="subject" class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">subject Collection</span>
                      <select class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" name="subject[]" multiple>
                        @foreach ($subjects as $subject)
                          @if (old('subject') == $subject->id)
                            <option value="{{ $subject->id }}" selected>{{ $subject->subject }}</option>
                          @else
                            <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                          @endif
                        @endforeach
                      </select>
                      @error('subject')
                      <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        {{ $message }}
                      </div>
                      @enderror
                    </label>
                    <label for="author" class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Author</span>
                        <select class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border multiple-select" value="{{ old('author') }}" name="author[]" multiple="multiple">
                          @foreach ($authors as $author)
                            @if (old('author') == $author->id)
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
                    <label for="author_code" class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">author_code</span>
                      <input type="text" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="New author_code collection" name="author_code" value="{{ old('author_code') }}" autofocus>
                      @error("author_code")
                          <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                              {{ $message }}
                          </div>
                      @enderror
                    </label>  
                    <label for="language" class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">Language</span>
                      <select class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" value="{{ old('language') }}" name="language">
                        @foreach ($languages as $language)
                          @if (old('language') == $language->id)
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
                    <label for="publish_year" class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Publication year</span>
                        <input type="text" id="publish_year" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="Publication Year" value="{{ old('publish_year') }}" name="publish_year">
                        @error('publish_year')
                            <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </label>
                    <label for="classification" class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Classification</span>
                        <input type="text" id="classification" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="Publication Year" value="{{ old('classification') }}" name="classification">
                        @error('classification')
                            <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </label>
                    <label for="volume" class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">volume</span>
                      <input type="text" id="volume" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="Publication Year" value="{{ old('volume') }}" name="volume">
                      @error('volume')
                          <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                              {{ $message }}
                          </div>
                      @enderror
                    </label>
                    <label for="edition" class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">edition</span>
                      <input type="text" id="edition" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="Publication Year" value="{{ old('edition') }}" name="edition">
                      @error('edition')
                          <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                              {{ $message }}
                          </div>
                      @enderror
                    </label>
                    <label for="collation" class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">collation</span>
                      <input type="text" id="collation" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="Publication Year" value="{{ old('collation') }}" name="collation">
                      @error('collation')
                          <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                              {{ $message }}
                          </div>
                      @enderror
                    </label>
                    <label for="publisher" class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">publisher</span>
                      <select class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" value="{{ old('publisher') }}" name="publisher">
                        @foreach ($publishers as $publisher)
                          @if (old('publisher') == $publisher->id)
                            <option value="{{ $publisher->id }}" selected>{{ $publisher->publisher }}</option>
                          @else
                            <option value="{{ $publisher->id }}">{{ $publisher->publisher }}</option>
                          @endif
                        @endforeach
                      </select>
                      @error('publisher')
                          <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                              {{ $message }}
                          </div>
                      @enderror
                    </label>
                    <label for="publish_city" class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">publish_city</span>
                      <input type="text" id="publish_city" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="Publication Year" value="{{ old('publish_city') }}" name="publish_city">
                      @error('publish_city')
                          <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                              {{ $message }}
                          </div>
                      @enderror
                    </label>
                    <label for="publish_year" class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">publish_year</span>
                      <input type="text" id="publish_year" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="Publication Year" value="{{ old('publish_year') }}" name="publish_year">
                      @error('publish_year')
                          <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                              {{ $message }}
                          </div>
                      @enderror
                    </label>
                    <label for="procurement" class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">procurement</span>
                      <select class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" value="{{ old('procurement') }}" name="procurement">
                        @foreach ($procurements as $procurement)
                          @if (old('procurement') == $procurement->id)
                            <option value="{{ $procurement->id }}" selected>{{ $procurement->procurement }}</option>
                          @else
                            <option value="{{ $procurement->id }}">{{ $procurement->procurement }}</option>
                          @endif
                        @endforeach
                      </select>
                      @error('procurement')
                          <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                              {{ $message }}
                          </div>
                      @enderror
                    </label>
                    <label for="year_of_procurement" class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">Year of Procurement</span>
                      <input type="text" id="year_of_procurement" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="Publication Year" value="{{ old('year_of_procurement') }}" name="year_of_procurement">
                      @error('year_of_procurement')
                          <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                              {{ $message }}
                          </div>
                      @enderror
                    </label>
                    <label for="price" class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">price</span>
                      <input type="text" id="price" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="Publication Year" value="{{ old('price') }}" name="price">
                      @error('price')
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
                @else
                    <label for="{{ $page == 'users' ? 'username' : $page }}" class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">{{ $title }}</span>
                        <input type="text" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="Fill New {{ $title }}" name="{{ $page == 'users' ? 'username' : $page }}" autofocus>
                        @error("{{ $page == 'users' ? 'username' : $page }}")
                            <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </label>
                @endif

                <button class="flex items-center justify-between mt-6 px-8 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                    </svg>
                   <span>{{ $title }}</span>
                  </button>
            </div>
        </form>
    </main>
    <script>
      $(document).ready(function() {
        console.log("masuk pak eko");
          // Select2 Multiple
          // $('.select2-multiple').select2({
          //     placeholder: "Select",
          //     allowClear: true
          // });
          // $('.multiple-select').select2();

      });
    </script>
@endsection