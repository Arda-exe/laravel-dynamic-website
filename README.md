# Elden Ring Forum

A dynamic Laravel 12 forum website dedicated to Elden Ring, featuring news, discussions, FAQ, and user profiles.

## Project Description

This is a full-stack web application built with Laravel for a school project. The forum allows users to discuss Elden Ring, share news, ask questions, and connect with other players.

## Setup Instructions

1. Clone the repository
2. Copy `.env.example` to `.env` and configure your database
3. Run `composer install`
4. Run `npm install`
5. Generate application key: `php artisan key:generate`
6. Run migrations and seeders: `php artisan migrate:fresh --seed`
7. Create storage symlink: `php artisan storage:link`
8. Run `npm run build`
9. Start the server: `php artisan serve`

## Features

- User authentication and profiles
- News articles with comments
- Forum discussions
- FAQ system
- Contact form
- Admin panel
