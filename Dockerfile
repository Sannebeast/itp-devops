FROM php:8.3-apache

# Install system packages
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git curl gnupg2 \
    # IMPORTANT CHANGE: Install libpq-dev for PostgreSQL, and then pdo_pgsql extension
    libpq-dev \
    && docker-php-ext-install pdo zip \
    # Add pdo_pgsql instead of pdo_mysql or alongside it if you need both
    && docker-php-ext-install pdo_pgsql \
    && apt-get clean

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js (18.x)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs
WORKDIR /var/www/

# Copy minimum files for composer install, including app/
COPY composer.json composer.lock ./
COPY artisan ./
COPY bootstrap/ ./bootstrap/
COPY config/ ./config/
COPY routes/ ./routes/
COPY app/ ./app/
COPY resources/ ./resources/
COPY vite.config.js ./
COPY public/ ./public/
# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Copy the rest of the project
COPY . .

# Build frontend assets
RUN npm ci && npm run build

# Configure Apache
COPY laravel.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

# Set correct permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Expose port
EXPOSE 80

CMD ["sh", "-c", "php artisan migrate:fresh --seed --force && php artisan serve --host=0.0.0.0 --port=8000"]
