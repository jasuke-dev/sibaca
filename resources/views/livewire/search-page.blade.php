<div class="bg-gray-50 min-h-screen">
    <div class="flex flex-col w-screen">
      <div class="flex flex-row flex-1 py-4 text-white font-bold justify-between flex-wrap bg-slate-900">
        <div class="grid grid-cols-10 basis-10/12 justify-between">
          <div class="font-mono text-3xl tracking-widest col-span-2 justify-self-center">Sibaca</div>
          <input type="text" wire:model="search" class="min-w-full text-black px-2 col-span-4 rounded-md" >
        </div>
        <div class="mr-14">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
          </svg>
        </div>
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
              <div class="flex flex-row space-x-4 border-2 p-2 rounded-md">
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
                  <select class="bg-gray-50 text-blue-700 focus:outline-none px-2" wire:model="author">
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
                  <select class="bg-gray-50 text-blue-700 focus:outline-none px-2" wire:model="language">
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
                  <select wire:model.defer="subject" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border multiple-select" id="id" placeholder="Start Typing..." name="subject[]">
                        {{-- @foreach ($subject as $id)
                          <option value="{{ $id }}"></option>
                          @endforeach --}}
                          <option value="9000">COBA COBA</option>
                  </select>
                </div>
                <button wire:click="$emit('rere')">click</button>
              </div>
            </div>
            <div id="results" class="col-span-8">
              @foreach ($results as $result)
                <div class="mb-4">
                  <a href="/details/{{ $result->id }}" class="text-xl font-bold text-blue-700 hover:text-purple-700"> {{ $result->title }} </a>
                  <div>
                    @foreach ($result->authors as $author)
                        <a href="" class="font-medium hover:text-green-900 text-lime-700">{{ $author->author }}</a>
                    @endforeach
                  </div>
                  <div>
                    @foreach ($result->subjects as $subject)
                        <a href="" class="font-medium hover:text-green-900 text-lime-700">{{ $subject->subject }}</a>
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

    // fetch('/search/ajax?data=subjects&query=a')
    //   .then(response => response.json())
    //   .then( data => 
    //     console.log(data)
    // )
    let selectSubject = new TomSelect('#id',{
          maxItems: null,
          maxOptions: 100,
          valueField: 'id',
          labelField: 'subject',
          searchField: 'subject',
          sortField: 'subject',
          load: function(query, callback) {
            console.log(`ini query 1 : ${query}`)
            var url = '/search/ajax?data=subjects&query='+encodeURIComponent(query);
            fetch(url)
              .then(response => response.json())
              .then(data => {
                callback(data);
                console.log(`first load : ${data}`);
              }).catch(()=>{
                callback();
              });
          },
          create: true
    });
    
    // window.addEventListener('changed-tracker', event => {
          
    //       selectSubject.on('change', (value, e) =>{
                
    //             console.log("emmit");
    //             Livewire.emit('subjectChanged',value);
    //             Livewire.emit('rere');
    //           });
    // });

    // selectSubject.on('change', function(value){
    //     let prev = value;
    //       Livewire.emit('subjectChanged', value);
    //   });


    window.addEventListener('subject-updated', event => {
          selectSubject.destroy();
          console.log("destroy tom select");
          selectSubject = new TomSelect('#id',{
                maxItems: null,
                maxOptions: 100,
                valueField: 'id',
                labelField: 'subject',
                searchField: 'subject',
                sortField: 'subject',
                load: function(query, callback) {
                  console.log(`ini query 2 : ${query}`)
                  var url = '/search/ajax?data=subjects&query='+encodeURIComponent(query);
                  fetch(url)
                    .then(response => response.json())
                    .then(data => {
                      console.log(`second load : ${data}`);
                      callback(data);
                    }).catch(()=>{
                      callback();
                    });
                },
                create: true
          });
          try {
            console.log("masuk bos")
            if(selectSubject.setValue(9000)){
                console.log(`prev subject = ${event.detail.newSubject}`);
            }else{
                console.log("gagal bos")
            }
          } catch (error) {

            
            console.log("gagal bos")
          }
              console.log(`prev subject = ${event.detail.newSubject}`);


    })

    // selectSubject.on('change', (value, e) =>{            
    //     console.log("emmit");
    //     Livewire.emit('subjectChanged',value);
    //     Livewire.emit('rere');
    //     status=false;
    // });

    // new TomSelect("#select-subjects",{
    //   create: true,
    //   sortField: {field: "text"}
    // });
    // let id = @js($randID);
    // let check = true;
    // console.log(id)
    // window.addEventListener('contentChanged', event => {
    //     let id = @js($randID);
    //     console.log(id)
    //     console.log("ada event masuk");
    //     check = false
    //     TOM.destroy();
    //     let TOM = new TomSelect(`#id`,{
    //       maxItems: null,
    //       maxOptions: 100,
    //       valueField: 'id',
    //       labelField: 'subject',
    //       searchField: 'subject',
    //       sortField: 'subject',
    //       options: [
    //         {
    //           "id" :1,
    //           "subject" : "natural"
    //         },
    //         {
    //           "id" :2,
    //           "subject" : "plant based"
    //         },
    //         {
    //           "id" :3,
    //           "subject" : "medic"
    //         },
    //         {
    //           "id" :4,
    //           "subject" : "militer"
    //         },
    //       ],
    //       create: false
    //     });
    // });

  
    // if(check){
    //   let TOM = new TomSelect(`#id`,{
    //     maxItems: null,
    //     maxOptions: 100,
    //     valueField: 'id',
    //     labelField: 'subject',
    //     searchField: 'subject',
    //     sortField: 'subject',
    //     options: [
    //       {
    //         "id" :1,
    //         "subject" : "natural"
    //       },
    //       {
    //         "id" :2,
    //         "subject" : "plant based"
    //       },
    //       {
    //         "id" :3,
    //         "subject" : "medic"
    //       },
    //       {
    //         "id" :4,
    //         "subject" : "militer"
    //       },
    //     ],
    //     create: true
    //   });
    // }

  </script>
