<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <x-mary-form wire:submit="register">
        <!-- Name -->
        <x-mary-input label="Name" wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name"
                      autofocus autocomplete="name"/>


        <!-- Email Address -->
        <x-mary-input label="Email" wire:model="email" id="email" class="block mt-1 w-full" type="email"
                      name="email"
                      autocomplete="username"/>


        <!-- Password -->
        <x-mary-input label="Password" wire:model="password" id="password" class="block mt-1 w-full"
                      type="password"
                      name="password"
                      autocomplete="new-password"/>


        <!-- Confirm Password -->
        <x-mary-input label="Password Confirmation" wire:model="password_confirmation" id="password_confirmation"
                      class="block mt-1 w-full"
                      type="password"
                      name="password_confirmation" autocomplete="new-password"/>


        <div class="flex items-center space-x-2 md:space-x-4 justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <button class="btn btn-primary" type="submit">
                {{ __('Register') }}
            </button>
        </div>
    </x-mary-form>
</div>
