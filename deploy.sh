#!/usr/bin/bash
composer install --no-dev
npm install
php artisan migrate --database portal --path database/migrations/portal
php artisan migrate --database authentication --path database/migrations/authentication
npm run production
