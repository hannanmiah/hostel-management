<?php

use function Livewire\Volt\{state, layout, title};

layout('layouts.general');
title('Home | Hotel Management');
$hostels = \App\Models\Hostel::all();
state('hostels', $hostels);

?>

<div class="container mx-auto px-4">
    <h1 class="text-4xl font-bold my-8">Welcome to our Hotel Management Site</h1>
    <div class="grid grid-cols-3 gap-4">
        @foreach($hostels as $hostel)
            <div class="bg-white rounded overflow-hidden shadow-lg">
                <img class="w-full h-64 object-cover" src="{{ $hostel->image }}" alt="{{ $hostel->name }}">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $hostel->name }}</div>
                    <p class="text-gray-700 text-base">{{ $hostel->location }}</p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <a href="{{route('hostels.view', $hostel->id)}}"
                       class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Book Now
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
