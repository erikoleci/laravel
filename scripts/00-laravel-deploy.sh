#!/bin/sh

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

echo "Seeding database (admin user etc.)"
php artisan db:seed --force || true
