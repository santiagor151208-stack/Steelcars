FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip libzip-dev libicu-dev

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --optimize-autoloader --no-dev

# No crear .env aún, usaremos variables de Railway directamente
RUN php artisan key:generate --force

EXPOSE 8080

CMD bash -c "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8080"
