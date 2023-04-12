<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Webit Auction') }}
        </h1>
    </x-slot>

    <x-slot name="slot">
        <div  class="space-y-6">
        <!-- FEATURED ITEMS -->
        <x-title>Featured Items</x-title>
        <div class="grid gap-4 grid-cols-3 mb-4 ">

            @foreach($featured_items as $item)
                <div class=" items-center justify-center bg-gray-50 p-4 ">
                <a href="{{ route('items.view', [$item]) }}" >
                    <div class="max-w-sm overflow-hidden rounded-xl bg-white shadow-md duration-200 hover:scale-105 hover:shadow-xl mb-5">
                    <img src="{{ $item->getFirstMediaUrl('pet_images') }}" class=" w-full object-contain max-h-[200px]"  >
                    </div>
                    <ul>
                        <li  class="font-bold"> {{ $item->name }}</li>
                        <li> {{ $item->description }}</li>
                        @if($item->highestBid)
                            <li> Current highest bid: {{ $item->highestBid->amount }}€</li>
                        @else
                            <li> Be the first to place a bid</li>
                        @endif
                    </ul>
                </a>
                </div>
            @endforeach

        </div>

        <!-- OVERVIEW LOTS -->
        <x-title>Overview Lots</x-title>
        <div class="grid gap-4 grid-cols-2 mb-5 ">
            @foreach($lots as $lot)
                <div class=" items-center justify-center bg-gray-50 p-4 ">
                    <a href="{{ route('lots.view', [$lot]) }}">
                        <div class="max-w-sm overflow-hidden rounded-xl bg-white shadow-md duration-200 hover:scale-105 hover:shadow-xl mb-5">
                        <img src="{{ $lot->getFirstMediaUrl('lot_image') }}" class="w-full object-contain max-h-[200px]">
                        </div>
                        <ul>
                            <li class="font-bold"> {{ $lot->name }}</li>
                            <li> {{ $lot->description }}</li>
                            @if ($lot->started_at >= now() )
                                <li> Starts at: {{ $lot->started_at->format("d/m/Y h:i") }}</li>
                            @endif
                            <li> Ends at: {{ $lot->ended_at->format("d/m/Y") }}
                        </ul>
                    </a>
                </div>
            @endforeach
        </div>

        <div>
            <x-title>About us</x-title>
            <p> Welcome on the auction site of Webit Auction. We auction off many different items from retailers who have gone bankrupt or want to sell their stock.</p>
        </div>
        </div>
    </x-slot>
</x-app-layout>
