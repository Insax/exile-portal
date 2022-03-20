#!/usr/bin/bash
set -e

echo "Deployment Started"

(php artisan down) || true

git pull origin main

composer install --no-interaction --prefer-dist --optimize-autoloader

php artisan clear-compiled

php artisan optimize

export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"

npm install

npm run prod

php artisan migrate --force

php artisan up
