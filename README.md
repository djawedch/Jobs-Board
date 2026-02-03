# Laravel Jobs Board (Refactored)

This repository contains a refactored version of the **Laravel Jobs Board** application originally built while following **Jeffrey Way’s Laracasts course** on Laravel.  
The goal of this refactor is to apply best practices, improve structure, and prepare this project for professional review.

---

## 🚀 About

The Jobs Board is a simple job portal application where:
- Employers can post job listings
- Users can view and search job listings
- Basic user authentication is implemented

This project is intended as an **educational exercise** in Laravel development and project design.

---

## 📦 Features (Original Scaffold)

- Laravel authentication
- Job listings CRUD (create, read, update, delete)
- Blade templating
- Basic routing and controllers
- Migration and seeders

---

## 🧰 Tech Stack

- **Framework:** Laravel (PHP)
- **Templating:** Blade
- **CSS:** Tailwind
- **Database:** MySQL

---

## 🛠 Setup

1. Clone this repository  
   `git clone https://github.com/djawedch/Jobs-Board-Application-Laravel-Learning-Project-.git`
2. Install PHP dependencies  
   `composer install`
3. Copy `.env.example` → `.env`  
   `cp .env.example .env`
4. Generate app key  
   `php artisan key:generate`
5. Set up database and run migrations  
   `php artisan migrate --seed`
6. Start the app  
   `php artisan serve`

---

## 📜 License

This project uses the MIT license.

---

