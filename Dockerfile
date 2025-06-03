# Stage 1: Build assets with NodeAdd commentMore actions
FROM node:18 as frontend

WORKDIR /app

# Copy only frontend files for caching
COPY package*.json ./
RUN npm install

# Copy the rest of the frontend files and build
COPY resources/ ./resources/
COPY vite.config.* ./
RUN npm run build


# Stage 2: Laravel with PHP and Composer
FROM php:8.2-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git curl zip unzip libonig-dev libxml2-dev libzip-dev libpq-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy application source
COPY . .

# Copy built assets from frontend
COPY --from=frontend /app/public/build ./public/build

# Install PHP dependencies
RUN composer install --no-interaction --optimize-autoloader

# Set permissions for Laravel
RUN chown -R www-data:www-data storage bootstrap/cache public/build

# Expose port
EXPOSE 8000

# Run migrations and start Laravel server
CMD ["sh", "-c", "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000"]
