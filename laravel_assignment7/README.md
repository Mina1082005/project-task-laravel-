# Training Center Management System

A simple Laravel project for managing courses and students at a training center.

The admin can add, edit, view, and delete courses and students. Each student is registered in one course, and a course can have many students. A course cannot be deleted while students are registered in it.

The student page also includes search by name, filtering by course, and pagination. The dashboard shows the total number of courses and students.

## Running the project

This folder contains the application code, so you need to copy it into a new Laravel project.

1. Create a Laravel project with `composer create-project laravel/laravel training-center`.
2. Copy the `app`, `database`, `resources`, and `routes` folders into the new project.
3. Create a MySQL database named `training_center`.
4. Update the database settings in `.env` to match your MySQL setup.
5. Run `php artisan migrate`.
6. Start the app with `php artisan serve`.
7. Open `http://127.0.0.1:8000` in your browser.

Add a course first, then register students in it.

## Project structure

- `Course` and `Student` models handle the database relationships.
- Resource controllers handle adding, editing, listing, and deleting records.
- Blade views display the forms and tables.
- Migrations create the tables and foreign key.

The project uses validation for required fields, unique student emails, valid prices, and course selection. It uses `withCount()` for course student totals and eager loading for student course details.

This is a classroom project without login or admin authentication.
