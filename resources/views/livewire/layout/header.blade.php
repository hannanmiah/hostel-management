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
        <div class="flex items-center justify-between space-x-4 md:space-x-8 h-16">
            <a href="{{route('home')}}" class="flex-shrink-0" wire:navigate>
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800"/>
            </a>
            <div class="hidden md:flex items-center grow">
                <label class="input input-bordered flex items-center gap-2 w-full">
                    <input type="text" class="grow border-none ring-0 focus:ring-0" placeholder="Search"/>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                         class="w-4 h-4 opacity-70">
                        <path fill-rule="evenodd"
                              d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                              clip-rule="evenodd"/>
                    </svg>
                </label>
            </div>
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
                       class="btn btn-link">Login</a>
                    <a href="{{route('register')}}" wire:navigate
                       class="btn btn-link">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
