# Use PHP 8.2 with FPM
FROM php:8.2-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git curl zip unzip libonig-dev libxml2-dev libzip-dev libpq-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip

# Install Node.js and npm (for building Vite assets)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy Laravel files
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --optimize-autoloader

# Install Node dependencies and build assets
RUN npm install && npm run build

# Debug: List built assets (remove after confirming)
RUN ls -la public/build

# Set permissions for Laravel
RUN chown -R www-data:www-data storage bootstrap/cache public/build

# Expose port
EXPOSE 8000

# Run migrations and start Laravel server
CMD ["sh", "-c", "php artisan migrate --force && php -S 0.0.0.0:8000 -t public"]
