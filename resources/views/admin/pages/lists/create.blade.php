@extends('admin.layouts.main')

@section('container')
<select x-cloak id="select" class="hidden">
    <option value="1">Scifi</option>
    <option value="2">Horor</option>
    <option value="3">Romance</option>
    <option value="4">Comedy</option>
</select>
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Add {{ $title }}
            </h2>
        </div>

        {{-- form --}}
        <form action="/admin/{{ $page }}" method="POST">
            @csrf
            <div class="mx-8 px-8 py-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label for="{{ $page == 'users' ? 'username' : $page }}" class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">{{ $title }}</span>
                    <input type="text" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="Fill New {{ $title }}" name="{{ $page == 'users' ? 'username' : $page }}" required autofocus>
                    @error("{{ $page == 'users' ? 'username' : $page }}")
                        <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </div>
                    @enderror
                </label>
                @if ($page == 'users')    
                    <label for="type" class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Password</span>
                        <input type="text" class="block w-full text-sm bg-gray-100 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md p-3 mt-3 appearance-none border" placeholder="Fill Password" name="password" required autofocus>
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
@endsection