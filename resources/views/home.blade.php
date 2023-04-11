<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <!-- FEATURED ITEMS -->


        <!-- OVERVIEW LOTS -->
        <div class="grid gap-4 grid-cols-3 grid-rows-3">

        @foreach($lots as $lot)
                <a href="{{ route('lots.view', [$lot]) }}">
                    <ul>
                        <li> {{ $lot->name }}</li>
                        @if ($lot->started_at >= now() )
                            <li> Starts at: {{ $lot->started_at->format("d/m/Y h:i") }}</li>
                        @endif
                        <li> Ends at: {{ $lot->ended_at->format("d/m/Y") }}
                    </ul>
                </a>
        @endforeach
        </div>
    </x-slot>
</x-app-layout>
