@extends('layout')
@section('content')
    <div class="mx-4">
        @unless (empty($listing))
            <x-card class="p-10">
                <div class="flex flex-col items-center justify-center text-center">
                    <img class="w-48 mr-6 mb-6"
                        src={{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}
                        alt="" />

                    <h3 class="text-2xl mb-2">{{ $listing->title }}</h3>
                    <div class="text-xl font-bold mb-4">Acme Corp</div>
                    <ul class="flex">

                        <x-tags :listing_tags="$listing->tags" />
                    </ul>
                    <div class="text-lg my-4">
                        <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
                    </div>
                    <div class="border border-gray-200 w-full mb-6"></div>
                    <div>
                        <h3 class="text-3xl font-bold mb-4">
                            Job Description
                        </h3>
                        <div class="text-lg space-y-6">
                            <p>
                                {{ $listing->description }}
                            </p>
                        </div>
                        <div class="space-y-6 w-full">

                            <a href="mailto:{{ $listing->email }}"
                                class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"><i
                                    class="fa-solid fa-envelope"></i>
                                Contact Employer</a>

                            <a href="{{ $listing->website }}" target="_blank"
                                class="block bg-black text-white py-2 rounded-xl hover:opacity-80"><i
                                    class="fa-solid fa-globe"></i> Visit
                                Website</a>

                            <a href="{{ env('APP_URL') }}/listing/{{ $listing->id }}/edit"
                                class="block bg-orange-600 text-white py-2 rounded-xl hover:opacity-80"><i
                                    class="fa-solid fa-pencil"></i> Edit</a>
                            <form action="{{ env('APP_URL') }}/listing/{{ $listing->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 text-white py-2 rounded-xl hover:opacity-80 w-full"><i
                                        class="fa-solid fa-trash"></i> Delete</button>
                            </form>
                        </div>
                    </div>
            </x-card>
        </div>
    @else
        {{-- @php
                abort('404');
            @endphp --}}
        none
    @endunless
    </div>
@endsection
