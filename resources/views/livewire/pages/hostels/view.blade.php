<?php

use Livewire\Volt\Component;

new #[\Livewire\Attributes\Layout('layouts.general')] class extends Component {
    public \App\Models\Hostel $hostel;

    public function mount()
    {
        $this->hostel->load('bookings', 'rooms');
    }
}; ?>

<div class="container mx-auto">
    <div class="bg-white rounded overflow-hidden shadow-lg">
        <img class="w-full h-64 object-cover" src="{{ $hostel->image }}" alt="{{ $hostel->name }}">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ $hostel->name }}</div>
            <p class="text-gray-700 text-base">{{ $hostel->location }}</p>
        </div>
        <div class="py-4 px-8 flex flex-col gap-4">
            <h2 class="text-2xl font-bold">Rooms</h2>
            Total Rooms: {{ $hostel->rooms->count() }}
            <div class="grid grid-cols-4 gap-2">
                @foreach($hostel->rooms as $room)
                    <div class="card card-compact bg-base-100 shadow-xl">
                        <img class=""
                             src="https://media.istockphoto.com/id/500017122/photo/bedroom-interior-3d-illustration.jpg?s=1024x1024&w=is&k=20&c=xvRQ03tPd_db9DwJ7TsZAJ5wy6xjmLOAUN_Nj-pFl14="
                             alt="Shoes"/>
                        <div class="card-body">
                            <h2 class="card-title">#Room-{{$room->number}}</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores, quas.</p>
                            <div class="card-actions justify-end">
                                <a href="{{route('book',$room->id)}}" class="btn btn-primary" wire:navigate>Book Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
