
1. Download the project (or clone using GIT)
2. Copy `.env.example` into `.env` and configure your database credentials
3. extrak vendor
4. Go to the project's root directory using terminal window/command prompt
5. Run `composer install`
6. Set the application key by running `php artisan key:generate --ansi`
7. Run migrations `php artisan migrate`
8. Start local server by executing `php artisan serve`
