# Tasks for Today (IT0049 TSA2)

A CodeIgniter 4 task manager with public Welcome, Task List, Profile, and About pages. Authentication is required to create, edit, and archive tasks. Archiving sets `is_archived = 1`; archived tasks stay in MySQL and disappear from the public lists.

## Requirements

- PHP 8.2+ with `intl`, `mbstring`, and `mysqli` extensions
- Composer and MySQL/MariaDB
- Web server with `public/` as its document root (or the built-in development server)

## Run locally

1. Download or clone this repository. In its root folder, run `composer install` to install CodeIgniter into `vendor/`.
2. Create an empty MySQL database named `tasks_for_today` (or choose another name).
3. Copy `env` to `.env`. Set `CI_ENVIRONMENT = development`, `app.baseURL = 'http://localhost:8080/'`, and your own `database.default.*` values. **The base URL must be a full URL with a trailing `/`.**
4. In `.env`, add these lines, choosing your own strong password (at least 12 characters):

   ```ini
   DEMO_EMAIL = demo@example.com
   DEMO_PASSWORD = choose-a-strong-private-password
   ```

5. Run `php spark migrate` and `php spark db:seed DemoSeeder`.
6. Run `php spark serve --port 8080` and visit `http://localhost:8080/`. Log in with the email and password from `.env`.

The migration files create `users` (including a password hash column) and `tasks` (including `is_archived`, default `0`). The seeder hashes the supplied password with `password_hash()` and inserts two sample tasks. It does not put a working password in GitHub. **Remove `DEMO_PASSWORD` from `.env` after seeding; the saved hash remains usable.** If your TSA1 database already has data, back it up and adapt the schema rather than running these create-table migrations on populated tables.

## Check the assignment workflows

1. While logged out, visit `/`, `/tasks`, `/profile`, and `/about`. All four pages should open.
2. While logged out, visit `/tasks/new` or `/tasks/1/edit`: the login page should open. Submitting create/update/archive without a session should also redirect to login.
3. Log in and create a task; leave the title or date blank to see validation. Edit an existing task.
4. Archive a task and check that it disappears from both Welcome and Task List. Confirm its MySQL row still has `is_archived = 1`.
5. Log out and check that management routes redirect to login again.

## GitHub submission

Upload the **contents** of this folder to a GitHub repository, preserving folders and dotfiles (`.gitignore`, `.htaccess`). Include `app/`, `public/`, `writable/` (the placeholder files), `composer.json`, `spark`, `env`, and this README. Do not upload `.env`, real passwords, session files, or `vendor/`; `.gitignore` excludes them. The migration and seeder files are under `app/Database/` and serve as the required database setup files. If you add a SQL export with real user data, remove all credentials and private information before committing it.

For a host without Composer access, run `composer install --no-dev --optimize-autoloader` on your own computer and upload the resulting `vendor/` folder **to the host only**. Point the host to `public/`, set the real host URL in `.env`, and run migrations/seeding with CLI access or import an equivalent database export. A GitHub repository alone does not create a working hosted application; submit both the repository link and the hosted link as the assignment requires.

## Structure

| Location | Purpose |
| --- | --- |
| `app/Controllers/` | Public pages, login/logout, task management |
| `app/Filters/AuthFilter.php` | Guards management routes |
| `app/Models/` | Database access |
| `app/Views/` | Public pages and forms |
| `app/Database/Migrations/` | Database schema |
| `app/Database/Seeds/DemoSeeder.php` | Hashed demo login and sample tasks |
| `public/` | Web root, front controller, stylesheet |
