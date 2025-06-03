# ---------- Stage 1: Build frontend assets ----------
FROM node:18 AS frontend

WORKDIR /app

# Copy everything needed for Vite build
COPY package*.json ./
COPY vite.config.* ./
COPY resources/ ./resources/
COPY public/ ./public/
COPY .env .env

# Install dependencies and build Vite assets
RUN npm install
RUN npm run build

# ---------- Stage 2: Laravel with PHP + Composer ----------
FROM php:8.2-fpm

# Install required PHP extensions and system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libonig-dev libxml2-dev libzip-dev libpq-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory for Laravel
WORKDIR /var/www

# Copy Laravel application code
COPY . .

# Copy built Vite assets from frontend stage
COPY --from=frontend /app/public/build ./public/build

# Install PHP dependencies
RUN composer install --no-interaction --optimize-autoloader

# Set correct permissions
RUN chown -R www-data:www-data storage bootstrap/cache public/build

# Expose Laravel dev server port
EXPOSE 8000

# Run migrations and start Laravel development server
CMD ["sh", "-c", "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000"]
