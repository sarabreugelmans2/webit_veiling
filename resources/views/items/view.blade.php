<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $item->name }}
        </h2>
    </x-slot>

    <x-slot name="slot">
       <div>
           <p> {{ $item->description }} </p>
       </div>


    </x-slot>
</x-app-layout>
