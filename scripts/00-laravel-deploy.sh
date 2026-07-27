#!/usr/bin/env bash

echo "Running composer"
composer install --no-dev --working-dir=/var/www/html --optimize-autoloader

echo "Ensuring sqlite database file exists"
mkdir -p /var/www/html/database
touch /var/www/html/database/database.sqlite

if [ -z "$APP_KEY" ]; then
  echo "Generating app key"
  php artisan key:generate --force
fi

echo "Caching config"
php artisan config:cache

echo "Caching routes"
php artisan route:cache

echo "Running migrations"
php artisan migrate --force
