<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class BookForm extends Form
{
    public string $name = '';

    public string $email = '';

    public $phone = '8801234567890';

    public $address = '';

    public $checkin = '';

    public $checkout = '';

    public $adults = 1;

    public $children = 0;

    public $message = '';

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required|string|max:255',
            'checkin' => ['required', 'date_format:d-m-Y', 'before:checkout'],
            'checkout' => ['required', 'date_format:d-m-Y', 'after:checkin'],
            'adults' => 'required|numeric',
            'children' => 'nullable|numeric',
            'message' => 'nullable|string|max:255',
        ];
    }
}
