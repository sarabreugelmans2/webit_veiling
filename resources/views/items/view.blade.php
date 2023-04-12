<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $item->name }}
        </h1>

    </x-slot>

    <x-slot name="slot">
        <a class="border border-2 border-black rounded-md border-solid px-10 py-2 uppercase text-xs bg-white " href="{{route('lots.view', [$item->lot])}} ">Back to overview</a>
        <x-card class="mx-auto w-2/3 grid md:grid-cols-2 mt-5 gap-6">

            <div class="">
                @if($item->getMedia('pet_images')->count() !== 1 )
                    <x-slider>
                        @foreach($item->getMedia('pet_images') as $img)
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <span class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl dark:text-gray-800">First Slide</span>
                                <img src="{{ $img->getFullUrl() }}" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                            </div>
                        @endforeach
                    </x-slider>
                @else
                    <img src="{{ $item->getFirstMediaUrl('pet_images') }}" class="" alt="...">
                @endif

                <p> {{ $item->description }} </p>
            </div>

            <div class="space-y-4">
                <x-title>Bids</x-title>
                @if (session('status') === 'bid_placed')
                    <x-success-status status="Your bid has been placed"></x-success-status>
                @endif

                @if ($item->bids->isNotEmpty())
                    <table class="w-full sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5 text-center ">
                        <thead>
                        <tr class="bg-gray-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                            <th>User</th>
                            <th>Bid</th>
                        </tr>
                        </thead>
                        <tbody class="flex-1 sm:flex-none">
                        @foreach($item->bids as $bid)
                            <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 border border-gray">
                                <td>{{ $bid->user->name }}</td>
                                <td>{{ $bid->amount }}€</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Be the first to place a bid</p>
                @endif

                @if(auth()->check())
                    <form method="POST" action="{{route('items.bid', [$item])}}" class="bg-gray-200 p-2">
                        @csrf
                        <p class="uppercase text-sm font-bold pb-1">Place your bid</p>
                        <!-- form request -->
                        <div class="mb-6 flex gap-5">
                            <x-number-input type="number" name="amount" required></x-number-input>
                            <button class=" rounded-md bg-black px-10 py-2 text-white" type="submit"> Bid</button>
                        </div>
                    </form>
                @else
                    <p>You must be signed in to bid.
                        <a class=" rounded-md bg-black px-10 py-2 text-white" href="{{ route('login') }} "> Login</a>
                    </p>

                @endif
            </div>
        </x-card>


    </x-slot>
</x-app-layout>
