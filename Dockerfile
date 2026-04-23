FROM php:8.4-fpm

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip libzip-dev libicu-dev \
    nginx

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

# Crear .env desde .env.example si no existe
RUN cp .env.example .env

# Instalar dependencias
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Generar key y caché
RUN php artisan key:generate
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Configurar nginx
RUN cp nginx.conf /etc/nginx/sites-enabled/default

EXPOSE 8080

CMD bash -c "php artisan migrate --force && php-fpm -D && nginx -g 'daemon off;'"
