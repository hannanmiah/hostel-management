<?php

use function Livewire\Volt\{form, state, layout};

layout('layouts.general');
form(\App\Livewire\Forms\BookForm::class);
state(['room' => fn(\App\Models\Room $room) => $room]);
$store = function () {
    $this->validate();
    $number_of_occupants = (int)$this->form->adults + $this->form->children;
    $booking = \App\Models\Booking::create([
        'room_id' => $this->room->id,
        'hostel_id' => $this->room->hostel_id,
        'user_id' => auth()->id(),
        'check_in' => $this->form->checkin,
        'check_out' => $this->form->checkout,
        'number_of_occupants' => $number_of_occupants,
    ]);

    $this->redirect(route('book-confirmation', ['room' => $this->room->id, 'booking_id' => $booking->id]), navigate: true);
};

?>

<div class="container mx-auto flex flex-col space-y-4">
    <h1 class="text-2xl font-bold px-4">Booking: #Room-{{$room->number}}</h1>
    <div class="flex space-x-4">
        <form class="w-full p-4" wire:submit="store">
            <div class="flex flex-col space-y-4">
                <div class="flex flex-col space-y-2">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" wire:model.blur="form.name"
                           class="border border-gray-300 rounded p-2">
                    @error('form.name') <span class="text-error">{{ $message }}</span> @enderror
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" wire:model.blur="form.email"
                           class="border border-gray-300 rounded p-2">
                    @error('form.email') <span class="text-error">{{ $message }}</span> @enderror
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" wire:model="form.phone"
                           class="border border-gray-300 rounded p-2">

                </div>
                <div class="flex flex-col space-y-2">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" wire:model="form.address"
                           class="border border-gray-300 rounded p-2">
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="checkin">Checkin</label>
                    <input type="date" id="checkin" name="checkin" wire:model="form.checkin"
                           class="border border-gray-300 rounded p-2">
                    @error('form.checkin') <span class="text-error">{{ $message }}</span> @enderror
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="checkout">Checkout</label>
                    <input type="date" id="checkout" name="checkout" wire:model="form.checkout"
                           class="border border-gray-300 rounded p-2">

                </div>
                <div class="flex flex-col space-y-2">
                    <label for="adults">Adults</label>
                    <input type="number" id="adults" name="adults" wire:model="form.adults"
                           class="border border-gray-300 rounded p-2">

                </div>
                <div class="flex flex-col space-y-2">
                    <label for="children">Children</label>
                    <input type="number" id="children" name="children" wire:model="form.children"
                           class="border border-gray-300 rounded p-2">

                </div>
                <div class="flex flex-col space-y-2">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" wire:model="form.message"
                              class="border border-gray-300 rounded p-2"></textarea>
                </div>
                <div class="flex flex-col space-y-2">
                    <button type="submit" class="btn btn-primary">Book Now
                    </button>
                </div>
            </div>
        </form>
        <div class="self-center">
            <div class="card bg-base-100 shadow-xl">
                <figure><img
                        src="https://media.istockphoto.com/id/500017122/photo/bedroom-interior-3d-illustration.jpg?s=1024x1024&w=is&k=20&c=xvRQ03tPd_db9DwJ7TsZAJ5wy6xjmLOAUN_Nj-pFl14="
                        alt="bedroom"/></figure>
                <div class="card-body">
                    <h2 class="card-title">
                        #Room-{{$room->number}}
                    </h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, voluptatum!</p>
                </div>
            </div>
        </div>
    </div>
</div>
