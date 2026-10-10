A web application to manage a library: books, members, and loans.
Built with **Laravel** (PHP) and **MySQL**, with a Blade + Vite frontend.

## Features

- Book management: add, edit, delete, search
- Member management: register, update, list
- Loan management: borrow / return books, track due dates
- *(add: authentication? roles? dashboard? — whatever you built)*

## Tech Stack

- **Laravel** (PHP) — MVC, Eloquent ORM, migrations, routing
- **MySQL** — relational database
- **Blade** templates + **Vite** for assets
- **Composer** for PHP dependencies

## Project Structure
app/ # controllers, models, business logic
routes/ # web routes
database/ # migrations & seeders
resources/ # Blade views + frontend assets
tests/ # automated tests

text

## How to Run

```bash
git clone https://github.com/Nasr100/gestion-biblio.git
cd gestion-biblio

composer install
npm install

cp .env.example .env
php artisan key:generate

# configure DB in .env, then:
php artisan migrate --seed
npm run dev

php artisan serve
```
