import preset from './vendor/filament/support/tailwind.config.preset'
import forms from '@tailwindcss/forms'
import daisyui from "daisyui";

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
    ],
    plugins: [
        forms,
        daisyui
    ],
}
