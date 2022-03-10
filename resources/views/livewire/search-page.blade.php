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
      <div class="flex flex-row flex-1 justify-between flex-wrap divide-y divide-gray-300/50s">
          <div class="grid grid-cols-10 basis-10/12 justify-between py-4">
            <div class="col-span-2 justify-self-center">Filters Off</div>
            <div class="col-span-8 text-gray-500 font-light">
              About {{ $results->total() }} results
            </div>
          </div>
          <div class="grid grid-cols-10 basis-10/12 justify-between py-8">
            <div class="col-span-2 justify-self-center">Sibaca</div>
            <div id="results" class="col-span-8">
              @foreach ($results as $result)
                <div class="mb-4">
                  <a href="/details/{{ $result->id }}" class="text-xl font-bold text-blue-700 hover:text-purple-700"> {{ $result->title }} </a>
                  <div>
                    @foreach ($result->authors as $author)
                        <a href="" class="font-medium hover:text-green-900 text-lime-700">{{ $author->author }}</a>
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
