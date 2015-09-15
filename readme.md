L5-starter-kit
==============

This is my starter kit for Laravel 5.

### What It Includes

  * [Sentinel](https://github.com/cartalyst/sentinel): A framework agnostic authentication & authorization system. An update of Sentry.
  * [Intervention Image](https://github.com/Intervention/image): PHP Image manipulation library.


### Get Started

  * Rename `.env.example.php` to `.env.php` and change the environment configs as you wish. Note: you shouldn't
  * Change `username` in `database/seeds/SentinelSeeder.php` if you want.
  * Run `composer install` in root.
  * Run `php artisan key:generate`.
  * Run `chmod -R 777 storage`.
  * Run `chmod -R 777 bootstrap/cache`.
  * Optionally, run `chmod -R 777 public/uploads` if you want to have an upload folder for user-generated-content.
