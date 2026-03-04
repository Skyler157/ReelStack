FROM php:8.2-cli-alpine

WORKDIR /var/www/html

# System deps + PHP extensions needed by Laravel
RUN apk add --no-cache \
    bash \
    curl \
    git \
    unzip \
    libzip-dev \
    oniguruma-dev \
    && docker-php-ext-install pdo pdo_mysql bcmath pcntl

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy app source (artisan must exist before composer scripts run)
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

# Ensure writable Laravel directories
RUN mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

COPY docker/entrypoint.sh /usr/local/bin/reelstack-entrypoint
RUN chmod +x /usr/local/bin/reelstack-entrypoint

EXPOSE 10000

CMD ["reelstack-entrypoint"]
