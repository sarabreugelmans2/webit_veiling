<x-app-layout>
    <x-slot name="slot">
        <a class="border border-solid px-10 py-2 uppercase text-xs bg-white " href="{{route('lots.view', [$item->lot])}} ">Back to overview</a>
        <x-card class="mx-auto w-2/3 grid md:grid-cols-2 mt-5 gap-6 bg-white p-5">

            <div>
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

                <p class="font-light"> {{ $item->description }} </p>
            </div>

            <div class="space-y-4 relative">
                <x-title> {{ $item->name }}</x-title>
                @if (session('status') === 'bid_placed')
                    <x-success-status status="Your bid has been placed"></x-success-status>
                @endif

                @if ($item->bids->isNotEmpty())
                    <table class="w-full sm:bg-white overflow-hidden my-5 text-center">
                        <thead>
                        <tr class="bg-slate-100  flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
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
                    <p class="font-light">Be the first to place a bid</p>
                @endif

                @if(auth()->check())
                    <form method="POST" action="{{route('items.bid', [$item])}}" class="mt-6">
                        @csrf

                        <!-- form request -->
                        <div class="md:absolute bottom-0 right-O md:flex gap-4 w-full">
                            <x-number-input type="number" name="amount" placeholder="Place your bid" required class="inline-flex mb-4 mt-3 h-9 grow"></x-number-input>
                            <x-primary-button type="submit" class="inline-flex"> Bid</x-primary-button>
                        </div>
                    </form>
                @else
                    <p>You must be signed in to bid.
                        <a href="{{ route('login') }} ">
                            <x-primary-button>Login</x-primary-button>
                        </a>
                    </p>

                @endif
            </div>
        </x-card>


    </x-slot>
</x-app-layout>
