#!/bin/sh

if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
fi

if [ ! -f ".env" ]; then
    echo "Creating env file for env $APP_ENV"
    cp .env.example .env
else
    echo "env file exists."
fi

php artisan serve --port=$PORT --host=0.0.0.0 --env=.env

php artisan key:generate
php artisan cache:clear
php artisan view:clear

exec docker-php-entrypoint "$@"