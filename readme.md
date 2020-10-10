## Install project

composer install

create env file

cp .env.example .env
php artisan key:generate

## Run migration and seeders

php artisan migrate:refresh --seed
