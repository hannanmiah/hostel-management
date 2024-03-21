<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class BookForm extends Form
{
    #[Validate('required')]
    public string $name = '';

    #[Validate('required|email')]
    public string $email = '';

    #[Validate('required|numeric')]
    public $phone = '8801234567890';

    #[Validate('required')]
    public $address = '';

    #[Validate('required')]
    public $checkin = '';

    #[Validate('required')]
    public $checkout = '';

    #[Validate('required|numeric')]
    public $adults = 1;

    #[Validate('nullable|numeric')]
    public $children = 0;

    #[Validate('nullable|string|max:255')]
    public $message = '';

    public function store($room)
    {
        $this->validate();

        $number_of_occupants = (int) $this->adults + $this->children;
        $booking = \App\Models\Booking::create([
            'room_id' => $room->id,
            'hostel_id' => $room->hostel_id,
            'user_id' => auth()->id(),
            'check_in' => $this->checkin,
            'check_out' => $this->checkout,
            'number_of_occupants' => $number_of_occupants,
        ]);

        return $booking;
    }
}
