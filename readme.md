# Laravel Queue Demo

Used Laravel 5, jQuery, Bootstrap and a mySQL database.

I decided to use Laravel as I noticed it in the job description and it's not something I have any commercial experience with. It was nice to use and the documentation was very helpful, I do kind of wish I had just decided to do it with Symfony components now though as it would have taken me less time and been a lot smaller in size.

Javascript wise I decided to just stick with using some simple jQuery, I didn't feel like making this work with Ajax as it wasn't a requirement and I spent a lot of time playing with Laravel, hopefully that doesn't lose me points. 

## Install Instructions

- Run `composer install`
- Copy `.env.example` to `.env` and set the database details (it needs an empty database)

```
php artisan key:generate

php artisan migrate
php artisan db:seed
php artisan serve
```

At this point the application should be running at http://localhost:8000/