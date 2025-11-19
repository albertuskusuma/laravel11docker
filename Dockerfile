#rename file
# Dockerfile untuk Laravel 11
FROM php:8.2-fpm

# Install dependency OS
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev

# Install extension PHP
RUN docker-php-ext-install pdo pdo_mysql mbstring bcmath xml

# Copy composer dari image composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy semua kode Laravel ke dalam container
COPY . .

# Install dependensi PHP Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Buat file .env dari contoh
RUN cp .env.example .env

# Generate APP_KEY Laravel
RUN php artisan key:generate

# Setting permission bisa jika perlu (tergantung server)
# RUN chown -R www-data:www-data /var/www

CMD ["php-fpm"]
