<?php

use Livewire\Volt\Component;

new #[\Livewire\Attributes\Layout('layouts.general')] class extends Component {
    public \App\Models\Room $room;

    #[\Livewire\Attributes\Url]
    public $booking_id;
}; ?>

<div class="container mx-auto flex flex-col">
    <div class="alert alert-success">
        <span>Successfully Booked #Room-{{$room->number}}</span>
    </div>
    <h2>Booking id: {{$booking_id}}</h2>
</div>
