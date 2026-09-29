https://jatumbokontasksfortodaytech2.iblogger.org/tasks-for-today-tech2/public

# Tasks for Today (IT0049 TSA2)

A CodeIgniter 4 task manager with public Welcome, Task List, Profile, and About pages. Authentication is required to create, edit, and archive tasks. Archiving sets `is_archived = 1`; archived tasks stay in MySQL and disappear from the public lists.

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
