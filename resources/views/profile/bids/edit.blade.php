<x-app-layout>
    <x-slot name="header">
        <x-title>
            Edit
        </x-title>
    </x-slot>


    <x-slot name="slot">
        <x-card class="mx-auto w-2/3 grid md:grid-cols-1 mt-5 gap-6 align-items-center">
            <div class="mx-auto">
            <a href="{{route('items.view', $bid->item)}}" target="_blank">
                <div >
                    <x-sub-title> {{ $bid->item->name }} </x-sub-title>
                </div>
                <div>
                    <img src="{{ $bid->item->getFirstMediaUrl('pet_images') }}" class="object-contain max-h-52" alt="...">
                </div>
                </a>
            </div>
                <div>
                    <form method="POST" action="{{route('profile.bids.edit', [$bid])}}" class="text-center">
                        @csrf
                        <input type="hidden" value="{{ $bid->amount }}" name="prevAmount">
                        € <x-number-input type="number" name="amount" placeholder="Your new bid" required value="{{ $bid->amount }}" min="{{ $bid->amount }}"></x-number-input>
                        <x-primary-button type="submit">Edit</x-primary-button>
                    </form>
                </div>

        </x-card>
    </x-slot>
</x-app-layout>
