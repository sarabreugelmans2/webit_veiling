<x-app-layout>
    <x-slot name="header">
        <x-title>
            Your bidding history
        </x-title>
    </x-slot>
    @livewireStyles
    <x-slot name="slot">
        <div>
            @switch(session('status'))
                @case('bid_edited')
                    <x-success-status status="Your bid has been successfully edited"></x-success-status>
                    @break
                @case('bid_deleted')
                    <x-success-status status="Your bid has been successfully removed"></x-success-status>
                    @break
            @endswitch

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

                            <button
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-bid-deletion')">
                                <x-heroicon-o-trash class="basis-1/3 h-5" />
                            </button>
                            <x-modal name="confirm-bid-deletion" focusable >
                                <form method="post" action="{{ route('profile.bids.destroy', $bid) }}" class="p-6 flex flex-col">
                                    @csrf
                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        {{ __('Are you sure you want to delete your bid?') }}
                                    </h2>
                                    <div class="mx-auto flex flex-row flex-1">
                                    <button type="button" x-on:click="$dispatch('close')" class="leading-10 px-4 mb-4 mt-8 inline-block bg-gray-100 mx-12"> Cancel </button>
                                    <x-primary-button type="submit"> Delete </x-primary-button>
                                    </div>
                                </form>
                            </x-modal>

                            @endif
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        @livewireScripts
    </x-slot>

</x-app-layout>
