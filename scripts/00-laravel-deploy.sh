#!/bin/sh

# Disable OPcache JIT for CLI: Render's sandbox blocks the executable-memory
# mapping JIT needs, which makes the plain `php` CLI binary fail outright
# with "Operation not permitted" while php-fpm (started separately) is fine.
PHP_CLI="php -d opcache.enable_cli=0 -d opcache.jit=0 -d opcache.jit_buffer_size=0"

echo "Ensuring sqlite database file exists"
mkdir -p /var/www/html/database
touch /var/www/html/database/database.sqlite

if [ -z "$APP_KEY" ]; then
  echo "Generating app key"
  $PHP_CLI artisan key:generate --force
fi

echo "Caching config"
$PHP_CLI artisan config:cache

echo "Caching routes"
$PHP_CLI artisan route:cache

echo "Running migrations"
$PHP_CLI artisan migrate --force

echo "Seeding database (admin user etc.)"
$PHP_CLI artisan db:seed --force || true
