FROM php:8.4-fpm

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip libzip-dev libicu-dev

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

# Actualizar composer.lock para PHP 8.4
RUN composer update --ignore-platform-req=php

# Instalar dependencias
RUN composer install --optimize-autoloader --no-dev --ignore-platform-req=php

# Crear .env y generar key
RUN cp .env.example .env
RUN php artisan key:generate
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

EXPOSE 8080

CMD bash -c "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8080"
