@extends('layout')
@section('content')
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <header>
                <h1 class="text-3xl text-center font-bold my-6 uppercase">
                    User Profile
                </h1>
            </header>
            <section class="flex flex-col">
                <div class="flex flex-col gap-5 border pl-10 py-5 border-gray-500">
                    <div class="name">Name : <b> {{ auth()->user()->name }}</b> </div>
                    <div class="email">Email : <b>{{ auth()->user()->email }}</b></div>
                </div>
                <div class="button flex w-full mt-10 gap-5">
                    <a href="{{ env('APP_URL') }}/users/{{ auth()->user()->id }}/edit"
                        class="block bg-orange-600 text-white text-center py-2 rounded-xl hover:opacity-80 w-full"><i
                            class="fa-solid fa-pencil"></i> Update Profile</a>
                    <a href="{{ env('APP_URL') }}/users/{{ auth()->user()->id }}/edit/password"
                        class="block bg-orange-600 text-white text-center py-2 rounded-xl hover:opacity-80 w-full"><i
                            class="fa-solid fa-pencil"></i> Update Password</a>
                </div>
            </section>


        </div>
    </div>
@endsection
