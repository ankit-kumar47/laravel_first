@extends('layout')
@section('content')
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Update User
                </h2>
            </header>

            <form action="{{ env('APP_URL') }}/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="name" class="inline-block text-lg mb-2">
                        Name
                    </label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                        value="{{ $user->name }}" />
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2">Email</label>
                    <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email"
                        value="{{ $user->email }}" />
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }} </p>
                    @enderror
                </div>
                <div class="mb-6">
                    <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black text-lg">
                        Update
                    </button>

                    <a href="{{ back()->getTargetUrl() }}" class="text-black ml-4">
                        Back
                    </a>

                </div>
            </form>
        </div>
    </div>
@endsection
