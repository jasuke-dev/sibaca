<div class="bg-gray-50 dark:bg-gray-800 min-h-screen overflow-hidden dark:text-gray-400" \>
    <div class="flex flex-col w-screen">
      <div class="flex flex-row flex-1 py-4 text-white font-bold justify-between flex-wrap bg-white dark:bg-gray-900 shadow-md">
        <div class="grid grid-cols-10 basis-10/12 justify-between">
          <div class="font-mono text-3xl tracking-widest col-span-2 justify-self-center text-gray-800 dark:text-gray-50">
            <a href="/search">
              Sibaca
            </a>
          </div>
          <div class="col-span-4">
            <div class="relative w-full max-w-xl mr-6 text-gray-600 focus-within:text-gray-800 dark:text-gray-200 dark:focus-within:text-white min-h-full">
              <div class="absolute inset-y-0 flex items-center pl-2">
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
              </div>
              <input type="text" wire:model.debounce.500ms="query" class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-2 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-gray-100 dark:focus:border-gray-500 border-gray-100 dark:border-gray-700 focus:outline-none focus:shadow-outline-purple form-input h-10" >
            </div>
          </div>
          {{-- <div class="min-w-full col-span-4 lg:mr-32 h-12">
            <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
              <div class="absolute inset-y-0 flex items-center pl-2">
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
              </div>
              <input
                class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input max-h-44" type="text" placeholder="Search for projects" aria-label="Search"
              />
            </div>
          </div> --}}
        </div>
        <ul class="flex items-center flex-shrink-0 space-x-6 mr-14 text-purple-600 dark:text-purple-300">
          <!-- Theme toggler -->
          <li class="flex" >
            <button
              x-data = "data()"
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
      <div class="flex flex-row flex-1 justify-between flex-wrap divide-y divide-gray-300/50 dark:divide-gray-700/50">
          <div class="grid grid-cols-11 basis-11/12 justify-between py-4">
            @if ($type || $author || $language || $subject)
              <div class="col-span-2 justify-self-center text-lime-600 font-semibold text-xl">
                Filter On
              </div>
            @else
              <div class="col-span-2 justify-self-center font-semibold text-xl">
                Filter Off
              </div>
            @endif
            <div class="col-span-8 text-gray-500 font-light">
              About {{ $results->total() }} results 
              {{ $type || $author || $language || $subject || $query ? 'for ':'' }}
              {{ $query ? $query : '' }}
              {{ $type ? 'Type '.$type.' ':'' }}
              {{ $author ? 'AND Author '.$author.' ':'' }}
              {{ $language ? 'AND Language '.$language.' ':'' }}
              @if ($subject)
                  @foreach ($subject as $value)
                    {{ $value }}
                  @endforeach
              @endif
            </div>
          </div>
          <div class="grid grid-cols-11 basis-11/12 justify-between py-8">
            <div class="col-span-2 justify-self-center space-y-4">
              <div class="flex flex-row space-x-4 border-2 p-2 rounded-md grow dark:border-gray-500">
                <div class="dark:text-gray-200">Type</div>
                <div>
                  <select class="bg-gray-50 text-blue-700 focus:outline-none px-2 dark:bg-gray-800 dark:text-gray-200 max-w-full" wire:model="type">
                    <option value="0">Any</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="flex flex-row space-x-4 border-2 dark:border-gray-500 p-2 rounded-md">
                <div class="dark:text-gray-200">Author</div>
                <div>
                  <select class="bg-gray-50 text-blue-700 dark:bg-gray-800 dark:text-gray-200 focus:outline-none px-2 w-24 max-w-full" wire:model="author">
                    <option value="0">Any</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->full_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="flex flex-row space-x-4 border-2 p-2 rounded-md dark:border-gray-500">
                <div class="dark:text-gray-200">Language</div>
                <div>
                  <select class="bg-gray-50 text-blue-700 focus:outline-none px-2 w-24 max-w-full dark:bg-gray-800 dark:text-gray-200" wire:model="language">
                    <option value="0">Any</option>
                    @foreach ($languages as $language)
                        <option value="{{ $language->code }}">{{ $language->language }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="border-2 p-2 rounded-md dark:border-gray-500">
                <div>subjects</div>
                <div>
                  <select wire:model.defer="subject" class="block text-sm dark:bg-gray-800 dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md p-3 mt-3 appearance-none multiple-select  w-56 max-w-full" id="id" placeholder="Start Typing..." name="subject[]">

                  </select>
                </div>
              </div>
              <button wire:click="ResetPage" class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-rose-500 hover:text-rose-500 hover:border-2 dark:hover:text-rose-500 focus:border-rose-500 active:text-rose-500 focus:outline-none focus:shadow-outline-gray min-w-full h-12">
                Reset Filter
              </button>
            </div>
            <div id="results" class="space-y-6 col-span-9 grid grid-cols-9">
              @foreach ($results as $result)
                <div class="mb-4 space-y-1 col-span-8">
                  <a href="/details/{{ $result->id }}" class="text-xl font-bold text-blue-700 hover:underline dark:text-blue-400 dark:hover:underline"> {{ $result->title }} </a>
                  <div>
                    @foreach ($result->authors as $author)
                        {{ $loop->index != 0 ? ','  : '' }}
                        <a href="" class="font-medium hover:text-green-900 text-lime-700 dark:text-lime-500 dark:hover:text-lime-400">{{ $author->full_name }}</a>
                    @endforeach
                  </div>
                  <div>
                    @foreach ($result->subjects as $subject)
                        <a href="" class="bg-slate-200 hover:bg-slate-300 dark:bg-gray-800 dark:hover:bg-gray-700 font-normal py-1 px-3 rounded text-sm">{{ $subject->subject }}</a>
                    @endforeach
                  </div>
                  <p class="line-clamp-3 md:line-clamp-2">{{ $result->abstract }}</p>
                </div>
                <div class="cols-span-1">
                  <a target="__blank" class="font-bold text-blue-600 dark:text-blue-400 flex space-x-2 justify-center items-center" href="{{ '/pdf/'.$result->id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span>Read</span>
                  </a>
                </div>
              @endforeach
            </div>
          </div>
          <div class="mt-12">
            {{ $results->links() }}
          </div>
      </div>
    </div>    
  </div>  
  <script>
    let selected_subject = [];

    let selectSubject = new TomSelect('#id',{
          maxItems: null,
          maxOptions: 100,
          valueField: 'code',
          labelField: 'subject',
          searchField: 'subject',
          sortField: 'subject',
          load: function(query, callback) {
            var url = '/search/ajax?data=subjects&query='+encodeURIComponent(query);
            fetch(url)
              .then(response => response.json())
              .then(data => {
                console.log(data);
                callback(data.subjects);
              }).catch(()=>{
                callback();
              });
          },
          create: false
    });
    
    //mutation observer
    // Select the node that will be observed for mutations
    const targetNode = document.querySelector('.ts-control');
    // Options for the observer (which mutations to observe)
    const config = { attributes: false, childList: true, subtree: false };
    // Callback function to execute when mutations are observed
    const callback = function(mutationsList, observer) {
        // Use traditional 'for loops' for IE 11
        for(const mutation of mutationsList) {
            if (mutation.type === 'childList') {
                selected_subject = [];
                let options = document.querySelectorAll(".item");
                for (let i = 0; i < options.length; i++) {
                  // selected_subject.push(options[i].dataset.value);
                  // selected_subject.push(options[i].textContent);
                  let obj = {
                    code : options[i].dataset.value,
                    subject : options[i].textContent
                  }
                  selected_subject.push(obj);
                }
                Livewire.emit('rere')
            }
            else if (mutation.type === 'attributes') {
                console.log('The ' + mutation.attributeName + ' attribute was modified.');
            }
        }
    };
    // Create an observer instance linked to the callback function
    const observer = new MutationObserver(callback);
    // Start observing the target node for configured mutations
    observer.observe(targetNode, config);


    let mod_select = document.getElementById('id');    

    window.addEventListener('subject-updated', event => {
          //mendestroy tomSelect guna menginisialisasi ulang
          selectSubject.destroy();
          selectSubject = new TomSelect('#id',{
                maxItems: null,
                maxOptions: 100,
                valueField: 'code',
                labelField: 'subject',
                searchField: 'subject',
                sortField: 'subject',
                options : selected_subject,
                load: function(query, callback) {
                  var url = '/search/ajax?data=subjects&query='+encodeURIComponent(query);
                  fetch(url)
                    .then(response => response.json())
                    .then(data => {
                      callback(data.subjects);
                    }).catch(()=>{
                      callback();
                    });
                },
                create: false
          });
          try {
            selectSubject.setValue(event.detail.newSubject)
            console.log(event,detail.newSubject)
            console.log("failed to reset value subject")
          } catch (error) {
            console.log("failed to reset value subject")
          }

          // melacak perubahan list subject untuk di inisialisaikan ulang ketika re render component livewire
          selectSubject.on('change', value=>{
              selected_subject = [];
              let options = document.querySelectorAll(".item");
              for (let i = 0; i < options.length; i++) {
                let obj = {
                  code : options[i].dataset.value,
                  subject : options[i].textContent
                }
                selected_subject.push(obj);
              }
              Livewire.emit('rere')
          });


    })

  </script>
