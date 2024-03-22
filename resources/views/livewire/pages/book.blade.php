<?php

use function Livewire\Volt\{form, state, layout, mount, computed};

layout('layouts.general');
form(\App\Livewire\Forms\BookForm::class);
state(['room' => fn(\App\Models\Room $room) => $room, 'booked_dates' => []]);
mount(function () {
    $this->room->load('hostel');
    $this->booked_dates = \App\Models\Booking::where('room_id', $this->room->id)->get()->map(function ($booking) {
        return [$booking->check_in->format('d-m-Y'), $booking->check_out->format('d-m-Y')];
    })->flatten()->toArray();
});

$config = computed(function () {
    return ['altFormat' => 'd M Y', 'dateFormat' => 'd-m-Y', 'minDate' => 'today', 'enableTime' => false, 'disable' => $this->booked_dates, 'locale' => 'en'];
});
dump($config);
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
        <x-mary-form class="w-full p-4" wire:submit="store">
            <div class="flex flex-col space-y-4">
                <x-mary-input wire:model.blur="form.name" label="Full Name" placeholder="Your name" icon="o-user"
                              hint="Your full name"/>
                <x-mary-input wire:model.blur="form.email" label="Email" type="email" placeholder="Your Email"
                              icon="o-user"
                              hint="Your Email hannan@gmail.com"/>
                <x-mary-input wire:model.blur="form.phone" label="Phone" placeholder="Your Phone" icon="o-user"
                              hint="01787378887"/>
                <x-mary-input wire:model.blur="form.address" label="Full Address" placeholder="Your Address"
                              icon="o-user"
                              hint="Your full address"/>
                <x-mary-datepicker type="date" label="Check In" wire:model.blur="form.checkin" icon="o-calendar"
                                   hint="22/07/24"
                                   :config="$this->config"/>
                <x-mary-datepicker type="date" label="Check Out" wire:model.blur="form.checkout" icon="o-calendar"
                                   hint="23/07/24"
                                   :config="$this->config"/>
                <x-mary-input wire:model.blur="form.adults" type="number" label="Adults" placeholder="Number of adults"
                              icon="o-user"
                              hint="2"/>
                <x-mary-input wire:model.blur="form.children" type="number" label="Children"
                              placeholder="Number of children"
                              icon="o-user"
                              hint="2"/>
                <x-mary-textarea
                    label="Message"
                    wire:model="form.message"
                    placeholder="Your message to us ..."
                    hint="Max 1000 chars"
                    rows="5"
                    inline/>
                <div class="flex flex-col space-y-2">
                    <button type="submit" class="btn btn-primary">Book Now
                    </button>
                </div>
            </div>
        </x-mary-form>
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
