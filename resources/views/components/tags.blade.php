@props(['listing_tags'])
@php
    $tags = explode(',', $listing_tags);
@endphp
@if (!empty($tags))
    @foreach ($tags as $tag)
        <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
            <a href="{{ env('APP_URL') }}/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
    @endforeach
@endif
