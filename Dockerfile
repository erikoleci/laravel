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

# Allow composer to run as root inside the container
ENV COMPOSER_ALLOW_SUPERUSER 1

# Install PHP deps at build time (no network dependency at container start)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Run our Laravel deploy tasks (key, migrate, seed, cache), then hand off
# to the base image's own start.sh which sets up nginx + php-fpm + storage.
CMD ["/bin/sh", "-c", "/var/www/html/scripts/00-laravel-deploy.sh && /start.sh"]
