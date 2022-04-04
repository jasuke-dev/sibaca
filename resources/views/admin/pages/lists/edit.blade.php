@extends('admin.layouts.main')

@section('container')
    @if(explode("/",Route::current()->uri)[1] == 'users')
    <main class="h-full py-16 overflow-y-auto">
      {{-- form --}}
      <form action="/admin/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="w-10/12 px-8 py-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
              Edit Collections
            </h2>
            <label for="username" class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">User</span>
                <input type="text" class="block w-full text-sm  shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="Edit User" name="username" required value="{{ old('username', $user->username) }}">
                @error("username")
                    <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        {{ $message }}
                    </div>
                @enderror
            </label>    
            <label for="password" class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Password</span>
                <input type="text" class="block w-full text-sm  shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="Fill Password" name="password">
                @error('password')
                    <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        {{ $message }}
                    </div>
                @enderror
            </label>
            <label for="role" class="block mt-4 text-sm">
              <div class="mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">
                    Account Type
                  </span>
                  <div class="mt-2 space-x-4">
                    @foreach(["super" => "Super Admin", "admin" => "Admin", "user" => "User"] AS $role => $roleLabel )
                      <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                        <input
                          type="radio"
                          class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                          name="role"
                          value="{{ $role }}"
                          {{ old('role', $user->role) == $role ? "checked = 'checked'" : '' }}
                        />
                        <span class="ml-2">{{ $roleLabel }}</span>
                      </label>
                    @endforeach
                  </div>
                  @error('password')
                  <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                      {{ $message }}
                  </div>
              @enderror
              </div>
            </label>
            {{-- button --}}
            <button class="flex items-center justify-between mt-6 px-8 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700" type="submit">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
              </svg>
             <span>Edit</span>
            </button>
          </div>
      </form>
    </main>
    @elseif(explode("/",Route::current()->uri)[1] == 'collections')
    <main class="h-full py-16 overflow-y-auto">
        {{-- form --}}
        <form action="/admin/collections/{{ $collection->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="w-10/12 px-8 py-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 mx-auto">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                  Edit Collections
                </h2>
                <label for="file" class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">File</span>
                    <div class="flex gap-4 mt-2">
                      <a target="_blank" class="font-bold text-purple-600 self-center" href="{{ asset('storage/'.$collection->path_file) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        PDF
                      </a>
                      <input type="file" class="block w-full text-sm  shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 appearance-none border-2 self-center" placeholder="Collection File" name="file" id="pdf_file">
                    </div>
                    <input type="hidden" name="oldFile" value="{{ $collection->path_file }}">
                    @error('file')
                        <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </div>
                    @enderror
                </label>
                <label for="Cover" class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Cover</span>
                    <div class="flex gap-4 mt-4">
                      <img src="{{ asset('storage/'.$collection->path_cover) }}" alt="Image not Found" class="h-40 self-center dark:text-gray-300">
                      <input type="file" class="block w-full text-sm  shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border-2 self-end" placeholder="Cover Image" name="cover">
                    </div>
                    <input type="hidden" name="oldCover" value="{{ $collection->path_cover }}">
                    @error('cover')
                        <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </div>
                    @enderror
                </label>
                <div class="h-fit my-4" id="pdf_preview">
                </div>
                <div class="flex space-x-4">
                  <label for="inventory_code" class="block mt-4 text-sm grow">
                    <span class="text-gray-700 dark:text-gray-400">Inventory Code</span>
                    <input type="text" class="block w-full text-sm shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border-2" placeholder="Inventory Code" name="inventory_code" id="inventory_code" value="{{ old('inventory_code',$collection->inventory_code) }}" autofocus>
                    @error("inventory_code")
                    <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                      {{ $message }}
                    </div>
                    @enderror
                  </label>
                  <label for="isbn_issn_doi" class="block mt-4 text-sm grow">
                    <span class="text-gray-700 dark:text-gray-400">ISBN/ISSN/DOI</span>
                    <input type="text" class="block w-full text-sm shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border-2" placeholder="ISBN/ISSN/DOI" value="{{ old('isbn_issn_doi',$collection->isbn_issn_doi) }}" name="isbn_issn_doi" id="isbn_issn_doi">
                    @error('isbn_issn_doi')
                        <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </div>
                    @enderror
                </label>

                </div>
                <div class="flex space-x-4">
                  <label for="title" class="block mt-4 text-sm grow">
                      <span class="text-gray-700 dark:text-gray-400">Title</span>
                      <input type="text" class="block w-full text-sm shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border-2" placeholder="Title collection" name="title" value="{{ old('title',$collection->title) }}" id="title">
                      @error("title")
                          <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                              {{ $message }}
                          </div>
                      @enderror
                  </label>  
                  <label for="subtitle" class="block mt-4 text-sm grow">
                    <span class="text-gray-700 dark:text-gray-400">Subtitle</span>
                    <input type="text" class="block w-full text-sm shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border-2" placeholder="Subtitle" name="subtitle" value="{{ old('subtitle',$collection->subtitle) }}" id="subtitle">
                    @error("subtitle")
                        <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </div>
                    @enderror
                  </label>
                  <label for="title_code" class="block mt-4 text-sm basis-1/12 shrink">
                      <span class="text-gray-700 dark:text-gray-400">Code</span>
                      <input type="text" class="block w-full text-sm border-2 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none" placeholder="Title Code" name="title_code" value="{{ old('title_code',$collection->title_code) }}" id="title_code">
                      @error("title_code")
                          <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                              {{ $message }}
                          </div>
                      @enderror
                  </label>  
                </div>
                <label for="abstract" class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Abstract</span>
                  <textarea
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md p-3 border-2"
                    rows="3" placeholder="Enter some long form content." name="abstract" id="abstract"
                  >{{ old('abstract',$collection->abstract) }}</textarea>
                  @error('abstract')
                        <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </div>
                    @enderror
                </label>
                <label for="type" class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Type Collection</span>
                  <select class="block w-full text-sm shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" name="type" id="type">
                    @foreach ($types as $type)
                      @if (old('type',$collection->type_id) == $type->id)
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
                <label for="select_subject" class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Subjects</span>
                  {{-- <input id="test" style="width:100%;" placeholder="type a number, scroll for more results" name="data" /> --}}
                  <select class="block w-full text-sm shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border multiple-select" id="select-subject" name="subjects[]" placeholder="Start Typing..."></select>
                </label>
                <div class="flex space-x-4">
                  <label for="author" class="block mt-4 text-sm grow">
                      <span class="text-gray-700 dark:text-gray-400">Author</span>
                      <select class="block w-full text-sm shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border multiple-select" name="author[]" multiple="multiple" id="author">
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->full_name }}</option>
                        @endforeach
                      </select>
                      @error('author')
                          <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                              {{ $message }}
                          </div>
                      @enderror
                  </label>
                  <label for="author_code" class="block mt-4 text-sm basis-1/12">
                    <span class="text-gray-700 dark:text-gray-400">Code</span>
                    <input type="text" class="block w-full text-sm shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 text-gray-800 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border-2" placeholder="New author_code collection" name="author_code" value="{{ old('author_code',$collection->author_code) }}">
                    @error("author_code")
                        <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </div>
                    @enderror
                  </label>
                </div>
                <div class="flex space-x-4">
                  <label for="language" class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Language</span>
                    <select class="block w-full text-sm shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border-2" value="{{ old('language') }}" name="language">
                      @foreach ($languages as $language)
                        @if (old('language', $collection->language_code) == $language->Code)
                          <option value="{{ $language->code }}" selected>{{ $language->language }}</option>
                        @else
                          <option value="{{ $language->code }}">{{ $language->language }}</option>
                        @endif
                      @endforeach
                    </select>
                    @error('language')
                        <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </div>
                    @enderror
                  </label>
                  <label for="classification" class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">Classification</span>
                      <input type="text" id="classification" class="block w-full text-sm shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border-2" placeholder="Publication Year" value="{{ old('classification', $collection->classification) }}" name="classification">
                      @error('classification')
                          <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                              {{ $message }}
                          </div>
                      @enderror
                  </label>
                  <label for="volume" class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Volume</span>
                    <input type="text" id="volume" class="block w-full text-sm shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border-2" placeholder="Publication Year" value="{{ old('volume',$collection->volume) }}" name="volume">
                    @error('volume')
                        <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </div>
                    @enderror
                  </label>
                  <label for="edition" class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Edition</span>
                    <input type="text" id="edition" class="block w-full text-sm shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border-2" placeholder="Publication Year" value="{{ old('edition',$collection->edition) }}" name="edition">
                    @error('edition')
                        <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </div>
                    @enderror
                  </label>
                  <label for="collation" class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Collation</span>
                    <input type="text" id="collation" class="block w-full text-sm  shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border-2" placeholder="Publication Year" value="{{ old('collation',$collection->collation) }}" name="collation">
                    @error('collation')
                        <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </div>
                    @enderror
                  </label>
                </div>
                <div class="flex space-x-4">
                  <label for="publisher" class="block mt-4 text-sm grow">
                    <span class="text-gray-700 dark:text-gray-400">Publisher</span>
                    <select class="block w-full text-sm  shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border-2" value="{{ old('publisher') }}" name="publisher" id="publisher">
                      @foreach ($publishers as $publisher)
                        @if (old('publisher',$collection->publisher_id) == $publisher->id)
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
                  <label for="publish_city" class="block mt-4 text-sm grow">
                    <span class="text-gray-700 dark:text-gray-400">Publish City</span>
                    <input type="text" id="publish_city" class="block w-full text-sm  shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border-2" placeholder="Publication Year" value="{{ old('publish_city',$collection->publish_city) }}" name="publish_city" id="publish_city">
                    @error('publish_city')
                        <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </div>
                    @enderror
                  </label>
                  <label for="publish_year" class="block mt-4 text-sm grow">
                    <span class="text-gray-700 dark:text-gray-400">Publish Year</span>
                    <input type="text" id="publish_year" class="block w-full text-sm  shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border-2" placeholder="Publication Year" value="{{ old('publish_year',$collection->publish_year) }}" name="publish_year" id="publish_year">
                    @error('publish_year')
                        <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </div>
                    @enderror
                  </label>
                </div>
                <div class="flex space-x-4">
                  <label for="procurement" class="block mt-4 text-sm grow">
                    <span class="text-gray-700 dark:text-gray-400">Procurement</span>
                    <select class="block w-full text-sm  shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border-2" value="{{ old('procurement',$collection->procurement_id) }}" name="procurement">
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
                  <label for="year_of_procurement" class="block mt-4 text-sm grow">
                    <span class="text-gray-700 dark:text-gray-400">Year of Procurement</span>
                    <input type="text" id="year_of_procurement" class="block w-full text-sm  shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border-2" placeholder="Publication Year" value="{{ old('year_of_procurement',$collection->year_of_procurement) }}" name="year_of_procurement">
                    @error('year_of_procurement')
                        <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </div>
                    @enderror
                  </label>
                  <label for="price" class="block mt-4 text-sm grow">
                    <span class="text-gray-700 dark:text-gray-400">Price</span>
                    <input type="text" id="price" class="block w-full text-sm  shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border-2" placeholder="Publication Year" value="{{ old('price',$collection->price) }}" name="price">
                    @error('price')
                        <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </div>
                    @enderror
                  </label>
                </div>
                <button class="flex items-center justify-between mt-6 px-8 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                    </svg>
                   <span>Edit</span>
                </button>
            </div>
        </form>
    </main>
    <script>
        let selected_subject = @js($collection->subjects);
        let selected_subject_code = @js($collection->subjects->pluck('code'));
        let selected_author = @js($collection->authors->pluck('id'));

        let selectAuthor = new TomSelect('#author',{
          create: async function(input, callback){
                let loop = true;
                let send = false;
                let inputAuthor = input.split(" ");
                let length = inputAuthor.length;
                console.log(length)
                if(length == 2){                  
                  if(inputAuthor[1].slice(-1) == "+"){
                    let lastname = inputAuthor[1].slice(0,-1);
                    let firstname = inputAuthor[0];
                    let newId;
                    const response = await fetch(`/addAuthor?firstname=${firstname}&lastname=${lastname}`);
                    const data = await response.json();

                    if(data.status == 'success'){
                      callback({value:data.id, text:`${firstname} ${lastname}`})
                    }
                  }
                }
              }
        });
        new TomSelect('#type',{
          
        });

        let selectSubject = new TomSelect('#select-subject',{
              maxItems: null,
              maxOptions: 100,
              valueField: 'code',
              labelField: 'subject',
              searchField: 'subject',
              sortField: 'subject',
              options : selected_subject,
              load: function(query, callback) {
                console.log(`ini query 1 : ${query}`)
                var url = '/search/ajax?data=subjects&query='+encodeURIComponent(query);
                fetch(url)
                  .then(response => response.json())
                  .then(data => {
                    callback(data);
                    console.log(data.subjects);
                  }).catch(()=>{
                    callback();
                  });
              },
              create: false
        });

        try {
          console.log(selected_subject_code)
            selectAuthor.setValue(selected_author)
            selectSubject.setValue(selected_subject_code)
            
        } catch (error) {
            console.log("failed to reset value subject")
        }
    </script>
    @endif
@endsection