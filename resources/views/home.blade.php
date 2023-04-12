<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Webit Auction') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <!-- FEATURED ITEMS -->
        <h2>Featured Items</h2>
        <div class="grid gap-4 grid-cols-3 mb-4">
            @foreach($featured_items as $item)
                <a href="{{ route('items.view', [$item]) }}">
                    <ul>
                        <li> {{ $item->name }}</li>
                        <li> {{ $item->description }}</li>
                        @if($item->highestBid)
                            <li> Current highest bid: {{ $item->highestBid->amount }}€</li>
                        @else
                            <li> Be the first to place a bid</li>
                        @endif
                    </ul>
                </a>
            @endforeach
        </div>

        <!-- OVERVIEW LOTS -->
        <h2>Overview Lots</h2>
        <div class="grid gap-4 grid-cols-3 mb-5 ">
            @foreach($lots as $lot)
                    <a href="{{ route('lots.view', [$lot]) }}">
                        <ul>
                            <li> {{ $lot->name }}</li>
                            <li> {{ $lot->description }}</li>
                            @if ($lot->started_at >= now() )
                                <li> Starts at: {{ $lot->started_at->format("d/m/Y h:i") }}</li>
                            @endif
                            <li> Ends at: {{ $lot->ended_at->format("d/m/Y") }}
                        </ul>
                    </a>
            @endforeach
        </div>

        <div>
            <h2>About us</h2>
            <p> Welcome on the auction site of Webit Auction. We auction off many different items from retailers who have gone bankrupt or want to sell their stock.</p>
        </div>
    </x-slot>
</x-app-layout>
