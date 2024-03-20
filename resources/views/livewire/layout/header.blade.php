<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect(route('home'), navigate: true);
    }
}; ?>

<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <a href="{{route('home')}}" class="flex-shrink-0" wire:navigate>
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800"/>
            </a>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="{{route('home')}}" wire:navigate
                       class="btn btn-link">Home</a>
                    <a href="/find"
                       class="btn btn-link">Find</a>
                    @auth
                        <a href="{{route('dashboard')}}" wire:navigate
                           class="btn btn-link">Dashboard</a>
                        <button class="btn" wire:click="logout">Logout</button>
                    @else
                        <a href="{{route('login')}}" wire:navigate
                           class="text-gray-800 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Login</a>
                        <a href="{{route('register')}}" wire:navigate
                           class="text-gray-800 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
