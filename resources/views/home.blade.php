<x-app-layout>
    <x-slot name="slot">
        <div class="space-y-24">

            <!-- FEATURED ITEMS -->
            <div>
                <x-title>Featured Items</x-title>
                <div class="grid gap-14 grid-cols-1 md:grid-cols-5 mb-4">
                    @foreach($featured_items as $item)
                        <div class=" items-center justify-center hover:scale-105 transition-all">
                            <a href="{{ route('items.view', [$item]) }}">
                                <div class="max-w-sm overflow-hidden mb-5 max-h-[200px] flex items-center justify-center">
                                    <img src="{{ $item->getFirstMediaUrl('pet_images') }}" class=" w-full object-contain">
                                </div>
                                <ul>
                                    <li>
                                        <x-sub-title> {{ $item->name }} </x-sub-title>
                                    </li>
                                    <li class="text-webit"> {{ $item->description }}</li>
                                    @if($item->highestBid)
                                        <li class="font-light"> Current highest bid: {{ $item->highestBid->amount }}€</li>
                                    @else
                                        <li class="font-light"> Be the first to place a bid</li>
                                    @endif
                                </ul>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- OVERVIEW LOTS -->
            <div>
                <x-title> Overview Lots</x-title>
                <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-14 ">

                    @foreach($lots as $lot)
                        <div class=" items-center justify-center hover:scale-105 transition-all mr-12">
                            <a href="{{ route('lots.view', [$lot]) }}">
                                <div class="relative">
                                    <x-primary-button class="absolute bottom-0 right-[-36px]">View</x-primary-button>
                                    <div class="overflow-hidden mb-5 mx-auto  max-h-[300px] flex items-center justify-center">
                                        <img src="{{ $lot->getFirstMediaUrl('lot_image') }}" class="w-full object-contain">
                                    </div>
                                </div>

                                <ul>
                                    <li>
                                        <x-sub-title> {{ $lot->name }} </x-sub-title>
                                    </li>
                                    <li class="font-light"> {{ $lot->description }}</li>
                                    @if ($lot->started_at >= now() )
                                        <li> Starts at: {{ $lot->started_at->format("d/m/Y h:i") }}</li>
                                    @endif
                                    <li class="text-webit"> Ends at: {{ $lot->ended_at->format("d/m/Y") }}
                                </ul>

                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- ABOUT -->
            <div>
                <x-title>About us</x-title>
                <p class="font-light mb-5"> Welcome on the auction site of Webit Auction. We auction off many different items from retailers who have gone bankrupt or want to sell their stock.</p>
            </div>
        </div>
    </x-slot>
</x-app-layout>
