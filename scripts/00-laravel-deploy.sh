#!/usr/bin/env bash

echo "Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader --working-dir=/var/www/html

echo "Setting permissions..."
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

echo "Caching configuration..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running database migrations..."
php artisan migrate --force

echo "Clearing route cache..."
php artisan route:clear

echo "Clearing and compiling views..."
php artisan view:clear
php artisan view:cache

echo "Listing routes..."
php artisan route:list

echo "Starting Laravel server..."
php artisan serve --host=0.0.0.0 --port=80
