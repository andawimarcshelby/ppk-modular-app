# syntax=docker/dockerfile:1

# PHP 8.3 CLI (dev) — runs `php artisan serve` per docker-compose.yml
FROM php:8.3-cli-bookworm

# System dependencies for Laravel + Postgres
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libzip-dev libpng-dev libonig-dev \
 && docker-php-ext-install pdo pdo_pgsql zip opcache \
 && apt-get clean && rm -rf /var/lib/apt/lists/*

# Composer (latest stable)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Workdir inside container; bind-mounted by docker-compose
WORKDIR /var/www/html

# Composer runs as root in container (dev), and vendor bin on PATH
ENV COMPOSER_ALLOW_SUPERUSER=1 \
    PATH="/var/www/html/vendor/bin:${PATH}"

# No CMD here — docker-compose sets:
# php artisan serve --host=0.0.0.0 --port=8000
