<div class="bg-gray-50 min-h-screen overflow-hidden">
    <div class="flex flex-col w-screen">
      <div class="flex flex-row flex-1 py-4 text-white font-bold justify-between flex-wrap bg-slate-900">
        <div class="grid grid-cols-10 basis-10/12 justify-between">
          <div class="font-mono text-3xl tracking-widest col-span-2 justify-self-center">Sibaca</div>
          <input type="text" wire:model="search" class="min-w-full text-black px-2 col-span-4 rounded-md" >
        </div>
        <ul class="flex items-center flex-shrink-0 space-x-6 mr-14">
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
              <img
                class="object-cover w-8 h-8 rounded-full"
                src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=aa3a807e1bbdfd4364d1f449eaa96d82"
                alt=""
                aria-hidden="true"
              />
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
      {{ $counter }}
      <div class="flex flex-row flex-1 justify-between flex-wrap divide-y divide-gray-300/50s">
          <div class="grid grid-cols-10 basis-10/12 justify-between py-4">
            <div class="col-span-2 justify-self-center">Filters Off</div>
            <div class="col-span-8 text-gray-500 font-light">
              About {{ $results->total() }} results
            </div>
          </div>
          <div class="grid grid-cols-10 basis-10/12 justify-between py-8">
            <div class="col-span-2 justify-self-center space-y-4">
              <div class="flex flex-row space-x-4 border-2 p-2 rounded-md grow">
                <div>Type</div>
                <div>
                  <select class="bg-gray-50 text-blue-700 focus:outline-none px-2" wire:model="type">
                    <option value="0">Any</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="flex flex-row space-x-4 border-2 p-2 rounded-md">
                <div>Author</div>
                <div>
                  <select class="bg-gray-50 text-blue-700 focus:outline-none px-2 w-24 max-w-full" wire:model="author">
                    <option value="0">Any</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->author }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="flex flex-row space-x-4 border-2 p-2 rounded-md">
                <div>Language</div>
                <div>
                  <select class="bg-gray-50 text-blue-700 focus:outline-none px-2 w-24 max-w-full" wire:model="language">
                    <option value="0">Any</option>
                    @foreach ($languages as $language)
                        <option value="{{ $language->id }}">{{ $language->language }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="border-2 p-2 rounded-md">
                <div>subjects</div>
                <div>
                  <select wire:model.defer="subject" class="block w-full text-sm shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border multiple-select" id="id" placeholder="Start Typing..." name="subject[]">

                  </select>
                </div>
                <button wire:click="$emit('rere')">click</button>
              </div>
            </div>
            <div id="results" class="col-span-8 space-y-6">
              @foreach ($results as $result)
                <div class="mb-4 space-y-1">
                  <a href="/details/{{ $result->id }}" class="text-xl font-bold text-blue-700 hover:text-purple-700"> {{ $result->title }} </a>
                  <div>
                    @foreach ($result->authors as $author)
                        <a href="" class="font-medium hover:text-green-900 text-lime-700">{{ $author->author }}</a>
                    @endforeach
                  </div>
                  <div>
                    @foreach ($result->subjects as $subject)
                        <a href="" class="bg-slate-200 hover:bg-slate-300 font-normal py-1 px-3 rounded text-sm">{{ $subject->subject }}</a>
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
  </div>  
  <script>
    let selected_subject = [];

    let selectSubject = new TomSelect('#id',{
          maxItems: null,
          maxOptions: 100,
          valueField: 'id',
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
                    id : parseInt(options[i].dataset.value),
                    subject : options[i].textContent
                  }
                  selected_subject.push(obj);
                }
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
                valueField: 'id',
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
          } catch (error) {
            console.log("failed to reset value subject")
          }

          // melacak perubahan list subject untuk di inisialisaikan ulang ketika re render component livewire
          selectSubject.on('change', value=>{
              selected_subject = [];
              let options = document.querySelectorAll(".item");
              for (let i = 0; i < options.length; i++) {
                let obj = {
                  id : parseInt(options[i].dataset.value),
                  subject : options[i].textContent
                }
                selected_subject.push(obj);
              }
          });


    })

  </script>
