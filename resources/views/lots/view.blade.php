<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $lot->name }}
        </h1>
    </x-slot>

    <x-slot name="slot">
        <div class="grid gap-4 grid-cols-3 mb-4">
            @foreach($items as $item)
                <a href="{{ route('items.view', [$item]) }}">
                    <div class=" items-center justify-center bg-gray-50 p-4 ">
                        <img src="{{ $item->getFirstMediaUrl('pet_images') }}" class="w-full object-contain max-h-[200px]">
                    </div>
                    <ul>
                        <li class="uppercase font-bold text-sm">{{ $item->name }}</li>
                        @if($item->highestBid)
                            <li> Current highest bid: {{ $item->highestBid->amount }}€</li>
                        @endif
                    </ul>
                </a>
            @endforeach

        </div>
    </x-slot>
</x-app-layout>
