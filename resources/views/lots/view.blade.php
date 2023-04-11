<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $lot->name }}
        </h2>
    </x-slot>

    <x-slot name="slot">

        @foreach($items as $item)
            <a href="{{ route('items.view', [$item]) }}">
                <ul>
                    <li>{{$item->name}}</li>
                    <!-- if item has bids show highest bid, amount of bids-->
                </ul>
            </a>
        @endforeach

        </div>
    </x-slot>
</x-app-layout>
