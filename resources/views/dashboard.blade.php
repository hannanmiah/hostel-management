@php
    $bookings = \App\Models\Booking::where('user_id', auth()->id())->get();
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold">My Bookings</h1>
                    <div class="grid grid-cols-4 gap-2">
                        @foreach($bookings as $booking)
                            <div class="card card-compact bg-base-100 shadow-xl">
                                <img class=""
                                     src="https://media.istockphoto.com/id/500017122/photo/bedroom-interior-3d-illustration.jpg?s=1024x1024&w=is&k=20&c=xvRQ03tPd_db9DwJ7TsZAJ5wy6xjmLOAUN_Nj-pFl14="
                                     alt="Shoes"/>
                                <div class="card-body">
                                    <h2 class="card-title
                                   ">
                                        Booking #{{$booking->id}}
                                    </h2>
                                    <p>Checkin: {{$booking->check_in}}</p>
                                    <p>Checkout: {{$booking->check_out}}</p>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
</x-app-layout>
