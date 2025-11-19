# Dockerfile untuk Laravel 11
FROM php:8.2-fpm

# Install dependency OS
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev

# Install extension PHP
RUN docker-php-ext-install pdo pdo_mysql mbstring bcmath xml

# Copy composer dari image resmi
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy kode Laravel ke dalam container
COPY . .

# Install dependency PHP
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Copy env template
RUN cp .env.example .env

# Generate APP_KEY
RUN php artisan key:generate

# Permission untuk Laravel
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

CMD ["php-fpm"]
