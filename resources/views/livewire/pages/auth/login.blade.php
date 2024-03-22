<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <x-mary-form wire:submit="login">
        <!-- Email Address -->
        <x-mary-input label="Email" wire:model="form.email" id="email" class="block mt-1 w-full" type="email"
                      name="email"
                      autofocus autocomplete="username" wire:model="form.email"/>


        <!-- Password -->

        <x-mary-input label="Password" wire:model="form.password" id="password" class="block mt-1 w-full"
                      type="password"
                      name="password"
                      wire:model="form.password"
                      autocomplete="current-password"/>


        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember" class="inline-flex items-center">
                <input class="checkbox" wire:model="form.remember" id="remember" type="checkbox" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end space-x-2 md:space-x-4 mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                   href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button class="btn btn-primary" type="submit">
                {{ __('Log in') }}
            </button>
        </div>
    </x-mary-form>
</div>
