#!/bin/bash
git pull
composer install --no-dev
npm install
php artisan migrate --database portal --path database/migrations/portal --force
php artisan migrate --database authentication --path database/migrations/authentication --force
npm run production
