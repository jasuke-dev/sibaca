@extends('layouts.main')

@section('container')
    <div class="w-screen h-screen flex justify-center items-center bg-upt bg-cover dark:bg-gray-900 bg-gray-100 shadow-2xl shadow-cool-gray-900" style="background-image:linear-gradient(rgba(14, 11, 19, 0.624), rgba(7, 24, 46, 0.659)), url('storage/upt.jpg')">
        <form class="p-10 bg-white dark:bg-gray-800 rounded flex justify-center items-center flex-col shadow-md" action="/login" method="POST">
            @csrf
            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-gray-600 dark:text-gray-100 mb-2" viewbox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
            </svg>
            <p class="mb-5 text-3xl uppercase text-gray-600 dark:text-gray-100">Login</p>
            @if(session()->has('loginError'))
            <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700 w-full" role="alert">
                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <div>
                    <span class="font-medium">Login Failed</span> {{ session('loginError') }}
                </div>
            </div>
            @endif
            <input type="username" name="username" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 dark:focus:border-purple-700" autocomplete="off" placeholder="Username" required>
            <input type="password" name="password" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 dark:focus:border-purple-700" autocomplete="off" placeholder="Password" required>
            <button class="bg-purple-600 hover:bg-purple-900 text-white font-bold p-2 rounded w-80" id="login" type="submit"><span>Login</span></button>
        </form>
    </div>
@endsection