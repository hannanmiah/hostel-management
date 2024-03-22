# Hostel Booking Site

This is a web application for booking hostels. It is built with Laravel, Livewire, Filament, Tailwindcss etc.

## Features

- User registration and authentication
- Search for available hostels
- Book a room for specific dates
- View booking history
- Admin panel for managing hostels, rooms, and bookings

## Installation

1. Clone the repository: `git clone https://github.com/hannanmiah/hostel-management.git`
2. Navigate to the project directory: `cd hostel-booking-site`
3. Install PHP dependencies: `composer install`
4. Install JavaScript dependencies: `npm install`
5. Copy the example environment file and make the required configuration changes in the `.env`
   file: `cp .env.example .env`
6. Generate a new application key: `php artisan key:generate`
7. Run the database migrations: `php artisan migrate`
8. Start the local development server: `php artisan serve`
9. For bundling assets run `npm run dev`
10. Database seeder: `php artisan db:seed` or `php artisan migrate:fresh --seed`

You can now access the server at http://localhost:8000
Admin panel access: http://localhost:8000/admin

## Usage

Register a new account, search for available hostels, and book a room.

## Contributing

Contributions are welcome! Please read the [contributing guide](CONTRIBUTING.md) to get started.

## License

This project is open-sourced software licensed under the [MIT license](LICENSE.md).
