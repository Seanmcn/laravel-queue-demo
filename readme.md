# Laravel Queue Demo

Used Laravel 5 & jQuery with an mySQL database.

## Install Instructions

- Run `composer install`
- Copy `.env.example` to `.env` and set the database details (it needs an empty database)

```
php artisan key:generate

php artisan migrate
php artisan db:seed
php artisan serve
```

At this point all tests should pass and the application should be running at http://localhost:8000/
