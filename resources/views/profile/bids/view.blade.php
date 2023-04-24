<x-app-layout>
    <x-slot name="header">
        <x-title>
            Your bidding history
        </x-title>
    </x-slot>

    <x-slot name="slot">
        <div>
            @if (session('status') === 'bid_edited')
                <x-success-status status="Your bid has been successfully edited"></x-success-status>
            @endif
            <table class="indent-4 w-full sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5    ">
                <thead>
                <tr class="bg-slate-200 text-left flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                    <th>Item</th>
                    <th>Your bids</th>
                    <th></th>
                </tr>
                </thead>
                <tbody class="bg-slate-100 flex-1 sm:flex-none">
                @foreach($bids as $bid)
                    <tr class=" flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 border border-gray  @if ($bid->amount !== $bid->item->highestBid->amount ) text-slate-300 @endif">
                        <td class="pl-2 ">{{ $bid->item->name }}</td>
                        <td class="pl-2">{{ $bid->amount }}€</td>
                        <td class="flex">
                            @if ($bid->amount == $bid->item->highestBid->amount )
                                <a href="{{ route('items.view', $bid->item) }}">
                                    <x-heroicon-o-eye class="basis-1/3 h-5"/>
                                </a>
                                <a href="{{ route('profile.bids.show', $bid) }}">
                                    <x-heroicon-o-pencil class="basis-1/3 h-5"/>
                                </a>
                                <x-heroicon-o-trash class="basis-1/3 h-5"/>
                            @endif
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </x-slot>

</x-app-layout>
