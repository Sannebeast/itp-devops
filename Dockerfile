# Use official PHP 8.1 image with FPM
FROM php:8.1-fpm

# Install system dependencies and PHP extensions needed for Laravel
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    libzip-dev \
    zip \
    libpq-dev \
    npm

# Install PHP extensions (pdo_pgsql for PostgreSQL, zip, etc)
RUN docker-php-ext-install pdo_pgsql zip

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Copy existing application files
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Install Node dependencies and build assets
RUN npm install && npm run build

# Expose port (Render will map this)
EXPOSE 8000

# Run Laravel's built-in PHP server
CMD php artisan serve --host=0.0.0.0 --port=8000
