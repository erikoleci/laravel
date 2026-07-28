FROM tangramor/nginx-php8-fpm:php8.3.10_node22.5.1

WORKDIR /var/www/html
COPY . .

# Image config
ENV WEBROOT /var/www/html/public
ENV CREATE_LARAVEL_STORAGE 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
ENV DB_CONNECTION sqlite
ENV DB_DATABASE /var/www/html/database/database.sqlite

# Allow composer to run as root inside the container
ENV COMPOSER_ALLOW_SUPERUSER 1

RUN composer install --no-dev --optimize-autoloader --no-interaction

# Render's runtime sandbox blocks exec() of the plain `php` CLI binary at
# container start (php-fpm itself is unaffected - it handles web requests
# fine). So instead of running artisan commands after the container boots,
# we bake the migrated + seeded sqlite db into the image at BUILD time,
# where php runs normally. APP_KEY is supplied via Render's env var, not
# generated here, so it isn't baked into a stale layer.
RUN mkdir -p database \
    && touch database/database.sqlite \
    && php artisan migrate --force \
    && (php artisan db:seed --force || true)

RUN chmod -R 775 storage bootstrap/cache database \
    && chown -R nginx:nginx storage bootstrap/cache database 2>/dev/null || true

CMD ["/start.sh"]
