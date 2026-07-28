FROM php:8.3-fpm-alpine

# System packages: nginx to serve HTTP, supervisord to run nginx+php-fpm
# together, plus build deps for the PHP extensions below.
RUN apk add --no-cache nginx supervisor sqlite-libs libpng libzip libxml2 icu-libs oniguruma \
    && apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS libpng-dev libzip-dev libxml2-dev sqlite-dev icu-dev oniguruma-dev \
    && docker-php-ext-install -j$(nproc) \
        pdo_sqlite pdo_mysql mysqli mbstring xml dom gd zip bcmath exif intl \
    && apk del .build-deps

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr
ENV DB_CONNECTION=sqlite
ENV DB_DATABASE=/var/www/html/database/database.sqlite
ENV COMPOSER_ALLOW_SUPERUSER=1

RUN composer install --no-dev --optimize-autoloader --no-interaction

# Bake the migrated + seeded sqlite db into the image at build time.
RUN mkdir -p database \
    && touch database/database.sqlite \
    && php artisan migrate --force \
    && (php artisan db:seed --force || true)

RUN chmod -R 775 storage bootstrap/cache database \
    && chown -R www-data:www-data storage bootstrap/cache database

RUN mkdir -p /run/nginx
COPY docker/nginx.conf /etc/nginx/http.d/default.conf
COPY docker/supervisord.conf /etc/supervisord.conf

EXPOSE 80
CMD ["supervisord", "-c", "/etc/supervisord.conf"]
