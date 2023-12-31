@props(['listing'])
<x-card class="p-6">
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block"
            src={{ $listing->logo ? (str_contains($listing->logo, 'logos/') ? asset('storage/' . $listing->logo) : $listing->logo) : asset('images/no-image.png') }}
            alt="" />
        <div>
            <h3 class="text-2xl hover:underline decoration-wavy">
                <a href="listing/{{ $listing->id }}">{{ $listing->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $listing['company'] }}</div>
            <ul class="flex">
                <x-tags :listing_tags="$listing->tags" />
            </ul>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing['location'] }}
            </div>
        </div>
</x-card>
</div>
