<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $item->name }}
        </h2>
    </x-slot>

    <x-slot name="slot">

        <x-card class="mx-auto w-2/3 grid md:grid-cols-2">

            <div> <p> {{ $item->description }} </p> </div>

<div>
    <h2>Bids</h2>
            @if (session('status') === 'bid_placed')
                <x-success-status status="Your bid has been placed">
                </x-success-status>
            @endif

            @if ($item->bids)
                <table class="table-auto">
                <thead>
                <tr>
                    <th>User</th>
                    <th>Bid</th>
                </tr>
                </thead>
                    <tbody>
                    @foreach($item->bids as $bid)
                    <tr>
                        <td>{{ $bid->user->name }}</td>
                        <td>{{ $bid->amount }}€</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif

    @if(auth()->check())
            <form method="POST" action="{{route('items.bid', [$item])}}" class="bg-gray-200 p-2">
               @csrf
                <p class="uppercase text-sm font-bold pb-1">Place your bid</p>
               <!-- form request -->
                <div class="mb-6 flex gap-5">
                    <x-number-input type="number"  name="amount" required> </x-number-input>
                    <button class=" rounded-md bg-black px-10 py-2 text-white" type="submit"> Bid </button>
                </div>
            </form>
    @else
        <p>You must be signed in to bid.
        <a class=" rounded-md bg-black px-10 py-2 text-white" href="{{ route('login') }} "> Login </a>
        </p>

    @endif
</div>
        </x-card>


    </x-slot>
</x-app-layout>
