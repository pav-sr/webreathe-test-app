## Installation

Run the following commands:

1. ./vendor/bin/sail up -d
2. ./vendor/bin/sail composer install
3. ./vendor/bin/sail php artisan migrate
4. ./vendor/bin/sail php artisan db:seed

## Stopping

Run ./vendor/bin/sail down

## Running modules

To simulate modules behaviour such as value and status changing, run the following command:

./vendor/bin/sail php artisan app:simulate-modules-data

## Web page

Go to http://0.0.0.0:80

Login email: admin@admin.com
Login password: admin

## Running tests

Run ./vendor/bin/sail phpunit

## Notes

There are some simplifying things for demo purposes:

- using JsonResponse instead of resources (Controllers\Api\\*)

Event listener "Listeners\SaveHistory" at "updating" model event is used for history generation 
