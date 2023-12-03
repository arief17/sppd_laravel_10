#!/bin/bash
set -e

echo "Deployment started ..."

# Enter maintenance mode or return true
# if already is in maintenance mode
(php artisan down) || true

# Pull the latest version of the app
git pull origin production

php -r "file_exists('.env') || copy('.env.example', '.env');"
php artisan key:generate
echo "DB_DATABASE=${{ secrets.DB_DATABASE }}" >> .env
echo "DB_USERNAME=${{ secrets.DB_USERNAME }}" >> .env
echo "DB_PASSWORD=${{ secrets.DB_PASSWORD }}" >> .env

# Install composer dependencies
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Clear the old cache
php artisan clear-compiled

# Recreate cache
php artisan optimize

# Compile npm assets
npm install

# Run database migrations
php artisan migrate --force

# Exit maintenance mode
php artisan up

echo "Deployment finished!"