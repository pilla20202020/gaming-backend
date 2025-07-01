# Winning Percentage Calculator

This Laravel project implements a simple algorithm to calculate the winning percentage for 4 teams playing a match based on their players' status, eliminations, and other attributes. The frontend is built with Vue.js and styled using TailwindCSS.

---

## Features

- CRUD operations for **Teams** and their **Players**.
- Calculate winning chance (1-100%) for each team based on player stats.
- Normalize winning percentages so that total of all 4 teams equals 100%.
- Simple dashboard displaying teams, players, and their calculated winning percentage.
- Responsive UI using Vue.js and TailwindCSS.

---

## Requirements

- PHP >= 8.1
- Laravel >= 10.x
- Node.js & npm/yarn
- MySQL or any supported database

---

## Installation

1. **Clone the repository:**

```bash
git clone https://github.com/pilla20202020/gaming-backend.git


## After this run this command
composer install
cp .env.example .env

php artisan key:generate


## setup the database after that run this php command 
php artisan migrate
php artisan db:seed

##after this run the project with this command 
php artisan serve
