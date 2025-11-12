# Gunakan image PHP dengan ekstensi yang dibutuhkan Laravel
FROM php:8.2-fpm

# Install dependencies sistem
RUN apt-get update && apt-get install -y \
    git unzip libpng-dev libonig-dev libxml2-dev zip curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Atur working directory
WORKDIR /var/www

# Copy semua file Laravel ke container
COPY . .

# Install dependency Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Set permission untuk storage & bootstrap/cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]