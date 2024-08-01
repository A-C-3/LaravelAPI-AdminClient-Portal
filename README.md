Laravel 11 Application

Introduction

This is a Laravel 11 application designed as an admin/client portal. The backend is powered by Laravel, and the frontend is a separate Vue.js application. The application includes features such as user authentication, role management, and interest tracking.

Features
	•	Role Management
	•	Interest Management
	•	Client-Admin Interactions
	•	RESTful API

Installation

Prerequisites
	•	PHP >= 8.1
	•	Composer
	•	Node.js & npm
	•	MySQL or any other supported database

Steps
    1.  Install dependencies:
            composer install
    2.  Set up the environment file:
            cp .env.example .env
    3.  Generate application key:
            php artisan key:generate
    4. Run database migrations and seeders:
            php artisan migrate --seed
    5. Start the development server:
            php artisan serve

