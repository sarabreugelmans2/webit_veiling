<x-app-layout>
    <x-slot name="slot">
        <x-title> {{ $lot->name }}</x-title>

        <div class="grid gap-4 grid-cols-3 mb-4">
            @foreach($items as $item)
                <a href="{{ route('items.view', [$item]) }}">
                    <div class=" items-center justify-center bg-gray-50 p-4 ">
                        <img src="{{ $item->getFirstMediaUrl('pet_images') }}" class="w-full object-contain max-h-[200px]">
                    </div>
                    <ul>
                        <li><x-sub-title> {{ $item->name }} </x-sub-title></li>
                        @if($item->highestBid)
                            <li> Current highest bid: {{ $item->highestBid->amount }}€ </li>
                        @endif
                    </ul>
                </a>
            @endforeach

        </div>
    </x-slot>
</x-app-layout>
