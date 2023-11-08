@extends('layout')
@section('content')
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <header>
                <h1 class="text-3xl text-center font-bold my-6 uppercase">
                    Manage Gigs
                </h1>
            </header>

            <table class="w-full table-auto rounded-sm">
                <tbody>
                    @unless (count($listings) == 0)
                        @foreach ($listings as $list)
                            <tr class="border-gray-300">
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <a href="{{ env('APP_URL') }}/listing/{{ $list->id }}">
                                        {{ $list->title }}
                                    </a>
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <a href="{{ env('APP_URL') }}/listing/{{ $list->id }}/edit"
                                        class="block text-blue-500 py-2 rounded-xl hover:opacity-80"><i
                                            class="fa-solid fa-pencil"></i> Edit</a>
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <form action="{{ env('APP_URL') }}/listing/{{ $list->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-500 py-2 rounded-xl hover:opacity-80"><i
                                                class="fa-solid fa-trash"></i> Delete</button>
                                    </form>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <p>No Listings Created. Create One</p>
                    @endunless

                </tbody>
            </table>
        </div>
    </div>
@endsection
