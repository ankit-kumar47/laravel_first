@extends('layout')
@section('content')
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Update Password
                </h2>
            </header>

            <form action="{{ env('APP_URL') }}/users/change_password" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="password" class="inline-block text-lg mb-2">
                        New Password
                    </label>
                    <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password2" class="inline-block text-lg mb-2">
                        Confirm New Password
                    </label>
                    <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" />
                    @error('password_confirmation')
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
