# Wedding RSVP Manager

A self-hosted, open source wedding RSVP manager built with Laravel and Filament.

Guests reply through a personal link or QR code. The couple manages everything from a simple admin panel: no code, no database access, no third-party RSVP service.

> **Status:** early development. The MVP is being built now and is not ready for production use yet.

## Features (MVP)

- **Household invitations** with unique, unguessable links and printable QR codes
- **Guest RSVP form**, mobile first: attendance for each guest, allergens and dietary notes
- **UK's 14 major allergens** pre-loaded, with an editable list
- **Change answers** using the same link, up to the RSVP deadline
- **Emails:** guest confirmation, admin notification of new replies, one-click reminders to households that haven't replied
- **Admin dashboard** with headline counts and an allergen summary
- **Exports** to CSV and Excel: full guest list, attendee list, dietary sheet for the kitchen
- **Fully configurable** from the admin panel: names, date, venue, deadline, welcome message, accent colour and logo
- **Privacy built in:** consent on the form and third-party exports without email addresses

## Tech stack

- [Laravel](https://laravel.com)
- [Filament](https://filamentphp.com) for the admin panel
- Blade templates for the guest pages
- MySQL or MariaDB in production, SQLite for local development
- Laravel's database queue for email
- Docker Compose for deployment
- [Pest](https://pestphp.com) for tests

## Local development

### Requirements

- PHP 8.3 or later
- Composer
- Node.js and npm
- [Laravel Herd](https://herd.laravel.com) (recommended on macOS and Windows)

### Setup

```bash
git clone https://github.com/CalumFleming/WeddingRSVPManager.git
cd WeddingRSVPManager

composer install
npm install
npm run build

cp .env.example .env
php artisan key:generate

touch database/database.sqlite
php artisan migrate

php artisan make:filament-user
```

If you use Herd, park or link the project folder and it will be served at `http://weddingrsvpmanager.test`. The admin panel is at `/admin`.

Without Herd, run `php artisan serve` and open `http://localhost:8000/admin`.

### Email in development

Set `MAIL_MAILER=log` in `.env` so emails are written to `storage/logs/laravel.log` instead of being sent. Alternatively, run [Mailpit](https://mailpit.axllent.org) locally to view them in a browser.

### Running tests

```bash
php artisan test
```

## Deployment

Docker Compose setup and a full deployment guide, including free hosting on an Oracle Cloud Always Free VM, are coming with the first release.

## Privacy

This app stores guests' names, email addresses and allergy information. Under UK GDPR, allergy information counts as health data. If you run it for your own wedding, you are responsible for how that data is handled: show a privacy notice, only collect what you need, and delete guest data after the event.

## Roadmap

After the MVP:

- Delete-all-guest-data button
- Read-only viewer role for a co-host or caterer
- Guest list CSV import
- Editable email wording
- Scheduled automatic reminders
- Multiple events per wedding (ceremony, reception, day-after)
- One-click deploy and a browser-based installer
- Block-based page builder and theme presets

## Contributing

Issues and pull requests are welcome. A contributing guide will follow once the MVP is in place.

## Licence

Released under the [MIT Licence](LICENCE).
